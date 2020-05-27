<?php

namespace App\Http\Controllers;

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


    public function error($msg='操作失败',$data=[],$status=0){
        return [
            'status'=>$status,
            'msg'=>$msg,
            'data'=>$data
        ];
    }
}
