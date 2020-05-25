<?php
/**
 *
 * User: yang
 * Date: 2020/5/24
 * Email: <393622951@qq.com>
 */


namespace App\Service;


use App\Model\admin\BrandModel;
use App\Model\admin\UserModel;
use App\Model\common\GoodsAttrModel;
use App\Model\common\GoodsModel;

class GoodsService
{
	public $model;
	public $error;

	public function __construct()
	{
		$this->model = new GoodsModel();
	}

	/**
	 * 添加产品
	 */
	public function createGoods($data){
//		todo 验证暂时没有

		$data['add_uid'] = session('user_info.id');
		$data['goods_rule_name'] = serialize($data['goods_rule_name']);
		$res = $this->model->insertData($data);
		return $res;
	}

	/**
	 * 格式化数据
	 */
	public function formatGoodsList(&$data){
		$brandModel = new BrandModel();
		$data['brand_name'] = $brandModel->getColumnsValue([['id','=',$data['brand_id']]],'name');
		$attrModel = new GoodsAttrModel();
		$data['attr_list'] = $attrModel->getListSelect([['goods_id','=',$data['id']]],['attr_name','attr_count']);
		$userModel = new UserModel();
		$data['add_name'] = $userModel->getColumnsValue([['id','=',$data['add_uid']]],'real_name');
		$data['audit_name'] = $userModel->getColumnsValue([['id','=',$data['audit_uid']]],'real_name');
		$data['status_dis'] = GoodsModel::$status_type[$data['status']];
	}

	/**
     * 添加产品规格
     */
	public function addGoodsAttr($data){
//	    todo 验证暂时没有


        $model = new GoodsAttrModel();
        $data['add_uid'] = session("user_info.id");
        $res = $model->insertData($data);
        return $res;
    }

    /**
     * 产品规格详情
     */
    public function getGoodsAttr($goodsId){
        $model = new GoodsAttrModel();
        $userModel = new UserModel();
        $goodsAttrList = $model->getListSelect([['goods_id','=',$goodsId]])->toArray();
        $arr = [];
        $index=0;
        $count = count($goodsAttrList);
        while ($index !=$count){
            $col=[];
            for ($i=0;$i<3 && $i<$count;$i++){
                $goodsAttrList[$i]['add_name'] = $userModel->getColumnsValue([['id','=',$goodsAttrList[$i]['add_uid']]],'real_name');
                $col[$i] = $goodsAttrList[$i];
                unset($goodsAttrList[$i]);
                $index+=1;
            }

            $goodsAttrList = array_values($goodsAttrList);
            dump($goodsAttrList);
            dump($index);
            dump($count);
            dd($col);
            array_push($arr,$col);
        }
        return $arr;
    }
}
