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


		$res = $this->model->insertData($data);
		return $res;
	}

    /**
     * 修改产品
     */
    public function updateGoods($id,$data){
        $res = $this->model->updateData($id,$data);
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
        $col=[];
        foreach ($goodsAttrList as $index=>$item){
            $item['add_name'] = $userModel->getColumnsValue([['id','=',$item['add_uid']]],'real_name');
            array_push($col,$item);
            if (count($col) == 3 || $index==count($goodsAttrList)-1){
                array_push($arr,$col);
                $col=[];
            }
        }
        return $arr;
    }
}
