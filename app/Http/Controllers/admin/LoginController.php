<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Index(){
        return view('admin.login.Index');
    }

    public function doLogin(Request $request){
        $input = $request->all();
        $model = new UserModel();
        $res = $model->checkUser($input['username'],$input['password'],$request->getClientIp());
        if ($res !==true){
            return redirect('admin/login')->with('errors',$res);
        }else{
            return redirect('admin/index');
        }
    }

    public function LoginOut(){
        session()->flush();
        return redirect('admin/login');
    }
}
