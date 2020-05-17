<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\ImportTplModel;
use App\Service\ImportService;
use App\Tools\ExcelCommon;
use Illuminate\Http\Request;

class ImportTplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ImportTplModel();
        $tplFieldArr = $model->getTplField();
        $data['tpl_field_list'] = $tplFieldArr;
        $data['field_type_arr']=ImportService::$field_type;
        return view("admin.import.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new ImportService();
        $res = $model->createImportTpl($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 导入订单页
     */
    public function importOrderIndex(){
    	$model = new ImportTplModel();
    	$tpl_list = $model->getDataSelect([],['id','name']);
    	$data['tpl_list'] = $tpl_list;
    	return view('admin.import.importOrderIndex',$data);
    }

    /**
     * 上传预览
     */
    public function importOrderPreview(Request $request){
	    $file = $request->file('file');
		$tplId = $request->input('tpl_id');
	    $model = new ImportService();
	    $res = $model->checkImportOrder($file,$tplId);

	    if ($res['goodsWithout'] || $res['attrWithout']){
		    $html= view('admin.import.importNotfound',$res)->render();
		    $data['html'] = $html;
		    return $this->error('请检查',$data);
	    }else{
		    $html= view('admin.import.ImportPreview',$res)->render();
		    $data['html'] = $html;
		    return $this->success('请查看预览',$data);
	    }


    }
}