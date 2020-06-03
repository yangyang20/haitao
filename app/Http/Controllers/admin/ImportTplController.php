<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\DealerModel;
use App\Model\admin\ImportTplModel;
use App\Service\CommonService;
use App\Service\ImportService;
use App\Tools\ExcelCommon;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportTplController extends Controller
{
    public function __construct()
    {
        $this->modle = new ImportService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $importList = $this->modle->getList([]);
        foreach ($importList as &$item){
            $this->modle->formatData($item);
        }
        $data['importList'] = $importList;
        return view("admin.import.index",$data);
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
        $dealerModel = new DealerModel();
        $data['dealerList'] = $dealerModel->getColumns([],['id','name']);
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
        $importTplInfo = $this->modle->getInfo($id);
        $this->modle->formatData($importTplInfo);
        $data['info'] = $importTplInfo;
        $dealerModel = new DealerModel();
        $data['dealerList'] = $dealerModel->getColumns([],['id','name']);
        $model = new ImportTplModel();
        $tplFieldArr = $model->getTplField();
        $data['tpl_field_list'] = $tplFieldArr;
        $data['field_type_arr']=ImportService::$field_type;
        return view("admin.import.edit",$data);
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
        $res = $this->modle->updateImportTpl($input,$id);
        if ($res){
        	return $this->success();
        }else{
        	return $this->error($this->modle->error);
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
	    if ($res == false){
	        unset($file);
	        return $this->error();
        }elseif ($res['goodsWithout'] || $res['attrWithout']){
	        unset($file);
		    $html= view('admin.import.importNotfound',$res)->render();
		    $data['html'] = $html;
		    return $this->error('请检查',$data);
	    }else{
	        $path=$file->store("orderFile");
	        $data['filePath'] = $path;
		    $html= view('admin.import.ImportPreview',$res)->render();
		    $data['html'] = $html;
		    return $this->success('请查看预览',$data);
	    }
    }

    /**
     * 上传插入
     */
    public function importOrderInsert(Request $request){
        $path = $request->input('file_path');
        $fileName = $request->input('file_name');
        $tplId = $request->input('tpl_id');
        $model = new ImportService();
        $res = $model->checkImportOrder( $path,$tplId,true,$fileName);
        if ($res == true){
           return $this->success();
        }else{
           return $this->error($this->modle->error);
        }
    }
}
