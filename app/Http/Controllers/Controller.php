<?php

namespace App\Http\Controllers;

use App\Service\CommonService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $modle;

    public function success($msg='操作成功',$data=[],$status=1){
        return [
            'status'=>$status,
            'msg'=>$msg,
            'data'=>$data
        ];
    }


    public function error($msg='',$data=[],$status=0){
        if (empty($msg)){
            $error = CommonService::getError();
            $msg =  '操作失败'.$error->getMessage()."【文件】:".$error->getFile()."【行数】:".$error->getLine();
        }
        return [
            'status'=>$status,
            'msg'=>$msg,
            'data'=>$data
        ];
    }
}
