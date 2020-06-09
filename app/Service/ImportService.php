<?php
/**
 * @Time    : 2020/5/13 14:58
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : ImportService.php
 * @Software: PhpStorm
 */

namespace App\Service;


use App\Model\admin\DealerModel;
use App\Model\admin\ImportLogModle;
use App\Model\admin\ImportTplModel;
use App\Model\admin\OrderModel;
use App\Model\common\GoodsAttrModel;
use App\Model\common\GoodsModel;
use App\Tools\Common;

use App\Tools\DBCommon;
use App\Tools\ExcelCommon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ImportService extends CommonService
{



//    创建的字段类型
    public static $field_type = [
        'varchar'=>'字符串',
        'int'=>'数值',
        'text'=>'长文本'
    ];
//    创建的字段类型长度
	public static $field_length = [
		'varchar'=>'255',
		'int'=>'11',
		'text'=>'0'
	];


    public function __construct()
    {
    	$this->model = new ImportTplModel();
    }

	/**
     * 创建导入模板
     */
    public function createImportTpl($input){
        DB::beginTransaction();
        try {
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'dealer_id' => 'required',
                'start_line'=>'required|Numeric',
                'table'=>'required'
            ]);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $tableName = Common::getPinYinFirstLetter($input['name']);
            $table=[];
            $table = $this->addTableFilter($table);
            foreach ($input['table'] as $item){
                $validator = Validator::make($item, [
                    'title' => 'required',
//                    'tag_id'=>'required|Numeric',
                ]);
                if ($validator->fails()) {
                    throw new \Exception($validator->errors()->first());
                }
                $_item = $this->createTableStructure($item['title'],"",$item['type'],self::$field_length[$item['type']], true,$item['tag_id']);
                array_push($table,$_item);
            }
            $model = new ImportTplModel();
            $_name = "import_tpl_".strtolower($tableName)."_".rand(111,999);
            $data = [
                'name'=>$input['name'],
                'dealer_id'=>$input['dealer_id'],
                'start_line'=>$input['start_line'],
                'table_name'=>$_name,
                'add_uid'=>session('user_info.id'),
                'add_real_name'=>session('user_info.real_name'),
                'table_config'=>serialize($table)
            ];

            $model->insertData($data);
            $tableRes = DBCommon::createTable($_name,$table);
            if (empty($tableRes)){
                throw new \Exception('数据表创建失败'.$_name);
            }
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            self::$error = $exception;
            return false;
        }
    }

    /**
     * 创建数据表结构
     */
    public function createTableStructure($title,$filter="",$type='varchar',$length=255,$is_null=true,$tag_id=""){
        if (empty($filter)){
            $filter =Common::getPinYinFirstLetter($title);
            $filter = strtolower($filter)."_".rand(11,99);
        }
        return [
            'title'=>$title,
            'type'=>$type,
            'length'=>$length,
            'filter'=>$filter,
            'tag_id'=>$tag_id,
            'is_null'=>$is_null?'DEFAULT NULL':'NOT NULL',
        ];
    }

    /**
     * 添加固定的元素
     */
    public function addTableFilter($table){
        $filter = $this->createTableStructure('导入的文件日志id','import_log_id','int',5,false);
        array_push($table,$filter);
//        $filter = $this->createTableStructure('导入的文件id','file_id','int',11,false);
//        array_push($table,$filter);
        return $table;
    }

	/**
	 * 检查导入的数据
	 */
    public function checkImportOrder($file,$tplId,$insert=false,$fileName=" "){
        try {
            $table = ExcelCommon::import($file);
            $tableTitle = $table[0];
            unset($table[0]);
//	    $tableTitlePY = Common::pinYinTransform($tableTitle);
            $tplInfo = $this->model->getDataInfo($tplId);
            $tableConfig = unserialize($tplInfo['table_config']);
            $filterArr = $this->filterTable($tableTitle,$tableConfig);
            $tplData = $this->createTplData($table,$filterArr);
            $orderColumns = $this->getOrderColumns($tableConfig);
            $orderData = $this->createOrderData($tplData,$orderColumns);
            $res = $this->checkOrderData($orderData);
            if ( empty($res['goodsWithout']) && empty($res['attrWithout']) && $insert){
                $result = $this->insertAllData($fileName,$tplId,$tplInfo['dealer_id'],$tplInfo['table_name'],$tplData,$res['orderDetails']);
                Storage::delete($file);
                return $result;
            }
            return $res;
        }catch (\Exception $exception){
            self::$error = $exception;
            return false;
        }

    }

	/**
	 * 过滤模板中没有的字段
	 */
    public function filterTable($tableTitle,$tableConfig){
	    $filterArr = [];

	    for ($i=0;$i<count($tableConfig);$i++){
		    for ($j=0;$j<count($tableTitle);$j++){
			    if ($tableConfig[$i]['title'] == $tableTitle[$j]){
				    $filterArr[$tableConfig[$i]['filter']] = $j;
				    continue;
			    }
		    }
	    }

	    return $filterArr;
    }

	/**
	 * 组装模板表数据
	 */
    public function createTplData($table,$filterArr){

	    $data=[];
	    foreach ($table as $item){
		    $columns=[];
		    foreach ($filterArr as $key=>$index){
			    $columns[$key] = $item[$index];
		    }
		    array_push($data,$columns);
	    }

	    return $data;
    }

    /**
     * 提取订单表所需字段
     */
    public function getOrderColumns($tableConfig){
		$orderColumnsArr = $this->model->getTplField();
	    $orderColumns = [];
	    foreach ($orderColumnsArr as $columns){
		    foreach ($tableConfig as $item){
			    if ($columns->id == $item['tag_id']){
				    $orderColumns[$columns->order_columns] = $item['filter'];
					continue;
			    }
		    }
	    }
		return $orderColumns;
    }

    /**
     * 拼接订单数据
     */
    public function createOrderData(&$tplData,$orderColumns){
	    //        找到必须的字段
	    $mustTplField = $this->model->getTplField([['is_null','=',$this->model::TPL_IS_MUST]]);

	    $orderData=[];
		foreach ($tplData as $data_key=>$item){
			$_item = [];
			foreach ($orderColumns as $key=>$column){
			    if (!empty($item[$column])){
                    $_item[$key] = $item[$column];
                }
			}
			$is_null = false;
//			关键数据没有则删除该行 避免插入空行
			foreach ($mustTplField as $field){
				if (empty($_item[$field->order_columns])){
					$is_null = true;
					break;
				}
			}
			if ($is_null){
				unset($tplData[$data_key]);
				continue;
			}
			array_push($orderData,$_item);
		}
		return $orderData;
    }

    /**
     * 检查订单数据
     */
    public function checkOrderData($orderData){
    	$goodsModel = new GoodsModel();
        $attrModel = new GoodsAttrModel();
//    	找不到的商品
	    $goodsWithout = [];
//      找不到商品规格
	    $attrWithout = [];
//      商品订单数量汇总
	    $goodsOrderAggregate = [];
//	    可以导入的订单总数
        $orderCount=0;
//        插入到订单表的数据详情
	    $orderDetails = [];
    	foreach ($orderData as $key=>$item){
            if (!isset($item['goods_name'])){
                dd($item);
            }
            $goodsAlias = "\"{$item['goods_name']}\"";

    	    $goodsArr = $goodsModel->where('goods_name','=',$item['goods_name'])->orWhere('alias_name','like',"%{$goodsAlias}%")->get()->toArray();

    	    if (!empty($goodsArr)){
                $attrAlias = "\"{$item['goods_attr_name']}\"";

	            foreach ($goodsArr as $goods){

                    $attrInfo = $attrModel->where([['attr_name','=',$item['goods_attr_name']],['goods_id','=',$goods['id']]])
                                            ->orWhere([['attr_name','like',"%{$attrAlias}%"],['goods_id','=',$goods['id']]])
                                         ->first();
                    if (!empty($attrInfo)){
                        $attrId = $attrInfo['id'];
                        $item['attr_id'] = $attrId;
                        $item['attr_count'] = $attrInfo['attr_count'];
                        $goodsId = $goods['id'];
                        $item['goods_id'] = $goodsId;
                        continue;
                    }
                }
	            if (empty($attrInfo)){
                    array_push($attrWithout,$item);
                    continue;
                }
            }else{
                array_push($goodsWithout,$item);
                continue;
            }

//	        todo 这里只加了商品名称和商品规格的检测 ，还可以加其他的






			$temp = $goodsId."_".$attrId;
		    if (isset($goodsOrderAggregate[$temp])){
			    $goodsOrderAggregate[$temp]['goods_count'] +=$item['goods_count'];
			    $goodsOrderAggregate[$temp]['order_count'] +=1;
		    }else{
			    $goodsOrderAggregate[$temp] = [
				    'goods_name'=>$item['goods_name'],
				    'goods_attr_name'=>$item['goods_attr_name'],
				    'goods_count'=>$item['goods_count'],
				    'order_count'=>1,
			    ];
	        }
			$orderCount+=1;
		    $order = [
		        'goods_id'=>isset($item['goods_id'])?$item['goods_id']:'',
			    'goods_name'=>isset($item['goods_name'])?$item['goods_name']:'',
			    'goods_attr_name'=>isset($item['goods_attr_name'])?$item['goods_attr_name']:'',
			    'goods_attr_id'=>isset($item['attr_id'])?$item['attr_id']:'',
			    'goods_attr_count'=>isset($item['attr_count'])?$item['attr_count']:'',
			    'goods_count'=>isset($item['goods_count'])?$item['goods_count']:'',
			    'order_sn'=>isset($item['order_sn'])?$item['order_sn']:'',
			    'order_time'=>isset($item['order_time'])?$item['order_time']:'',
			    'consignee'=>isset($item['consignee'])?$item['consignee']:'',
			    'consignee_mobile'=>isset($item['consignee_mobile'])?$item['consignee_mobile']:'',
			    'province'=>isset($item['province'])?$item['province']:'',
			    'city'=>isset($item['city'])?$item['city']:'',
			    'district'=>isset($item['district'])?$item['district']:'',
			    'address'=>isset($item['address'])?$item['address']:'',
			    'buyer_remark'=>isset($item['buyer_remark'])?$item['buyer_remark']:'',
			    'remark'=>isset($item['remark'])?$item['remark']:''
		    ];
		    array_push($orderDetails,$order);
    	}


    	return [
    	    'goodsWithout'=>$goodsWithout,
		    'attrWithout'=>$attrWithout,
		    'goodsOrderAggregate'=>$goodsOrderAggregate,
		    'orderCount'=>$orderCount,
		    'orderDetails'=>$orderDetails
	    ];
    }

	/**
	 * 插入数据
	 */
    public function insertAllData($file_name,$tpl_id,$dealer_id,$tableName,$tplData,$orderDetails){
        DB::beginTransaction();
        try {
            $nowTime = time();
            $importLog = [
                'name'=>$file_name,
                'import_tpl_id'=>$tpl_id,
                'dealer_id'=>$dealer_id,
                'add_time'=>$nowTime,
                'add_uid'=>session('user_info.id'),
                'add_name'=>session('user_info.real_name')
            ];
            $importLogModel = new ImportLogModle();
            $import_log_id = $importLogModel->insertData($importLog);
            foreach ($tplData as &$i_data){
                $i_data['add_uid'] = session('user_info.id');
                $i_data['import_log_id'] = $import_log_id;
                $i_data['add_time'] = $nowTime;
            }
            $importLogModel->insertImportExcelData($tableName,$tplData);
            foreach ($orderDetails as &$item){
                $item['import_log_id'] = $import_log_id;
                $item['dealer_id'] = $dealer_id;
                $item['add_time'] = $nowTime;
                $item['add_uid'] = session('user_info.id');
                $item['add_name']= session('user_info.real_name');
            }
            $orderModel = new OrderModel();
            $orderModel->insertDataList($orderDetails);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            self::$error = $exception->getMessage();
            DB::rollBack();
            return false;
        }

    }

    /**
     * 格式化展示数据
     */
    public function formatData(&$data){
        $dealerModel = new DealerModel();
        $data['dealer_name'] = $dealerModel->getColumnsValue([['id','=',$data['dealer_id']]],'name');
        $data['table_config'] = unserialize($data['table_config']);
//        dd($data['table_config']);
    }

	/**
	 * 修改数据
	 */
    public function updateImportTpl($data,$id){
	    DB::beginTransaction();
	    try {
		    $table = $data['table'];
		    unset($data['table']);
		    $info = $this->model->getDataInfo($id);
		    $addFilter = [];
		    foreach ($table as $key=>$item){
			    if (empty($item['filter'])){
				    $table[$key] = $this->createTableStructure($item['title'],"",$item['type'],self::$field_length[$item['type']],true,$item['tag_id']);
				    array_push($addFilter,$table[$key]);
			    }
		    }
		    $res = DBCommon::alterTable($info->table_name,$addFilter);
		    if (empty($res)){
			    throw new \Exception("数据字段添加修改失败");
		    }
		    $data['table_config'] = serialize($table);
		    $u_res = $this->model->updateData($id,$data);
		    if (empty($u_res)){
			    throw new \Exception("tpl修改失败");
		    }
		    DB::commit();
		    return true;
	    }catch (\Exception $exception){
	    	self::$error= $exception;
	    	DB::rollBack();
	    	return false;
	    }
    }

    /**
     *格式化导入日志列表
     */
    public function formatImportLogData(&$data){
        $dealerModel = new DealerModel();
        $data['dealer_name'] = $dealerModel->getColumnsValue([['id','=',$data['dealer_id']]],'name');
        $data['import_tpl_name'] = $this->model->getColumnsValue([['id','=',$data['import_tpl_id']]], 'name');
    }
}
