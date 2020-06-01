<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\BrandModel;
use App\Model\common\GoodsAttrModel;
use App\Model\common\GoodsModel;
use App\Service\GoodsService;
use App\Tools\Common;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new GoodsService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$model = new GoodsModel();
	    $goodsList = $model->getList([]);
	    $service = new GoodsService();
	    foreach ($goodsList as $item){
		    $service->formatGoods($item);
	    }
	    $data['goodsList'] = $goodsList;
        return view("admin.goods.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandModel = new BrandModel();
        $brandList = $brandModel->getColumns([],['id','name']);
        $data['brandList'] = $brandList;
	    return view("admin.goods.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	    $input = $request->all();
	    $model = new GoodsService();

	    $res = $model->createGoods($input);
	    if ($res){
	    	return $this->success();
	    }else{
	    	return $this->error($model->error);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goodsInfo = $this->model->getInfo($id);
        $brandModel = new BrandModel();
        $data['brand_list'] = $brandModel->getColumns([],['id','name']);
        $this->model->formatGoods($goodsInfo);
        $data['goodsInfo'] = $goodsInfo;
        return view("admin.goods.editGoods",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $model = new GoodsService();

        $res = $model->updateGoods($id,$input);
        if ($res){
            return $this->success();
        }else{
            return $this->error($model->error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new GoodsModel();
        $res = $model->deleteData($id);
        if ($res){
            return $this->success();
        }else{
            return $this->error();
        }
    }

    public function goodsAttrIndex($goodsId){
        $data['goods_id'] = $goodsId;
        $goodsAttrList = $this->model->getGoodsAttr($goodsId);
        $data['attrList'] = $goodsAttrList;
        return view("admin.goods.attrIndex",$data);
    }

    public function addGoodsAttrIndex($goodsId){
        $data['goods_id'] = $goodsId;
        return view("admin.goods.addAttrIndex",$data);
    }

    public function addGoodsAttr(Request $request){
        $input = $request->all();
        $res = $this->model->addGoodsAttr($input);
        if ($res){
            return $this->success();
        }else{
            return $this->error($this->model->error);
        }
    }

    public function editGoodsAttr($attr_id){
        $model = new GoodsAttrModel();
        $attrInfo = $model->getInfo($attr_id);
        $attrInfo['alias_name'] = Common::getTextFromMultiArr(unserialize($attrInfo['alias_name']));
        $data['attrInfo'] = $attrInfo;
        return view("admin.goods.editAttr",$data);
    }

    public function updateGoodsAttr(Request $request){
        $model = new GoodsAttrModel();
        $data = $request->all();
        $res = $model->updateData($data['id'],$data);
        if ($res){
            return $this->success();
        }else{
            return $this->error();
        }
    }
}
