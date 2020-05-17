<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index(){
        return view('admin.index.index');
    }

    public function Welcome(){
        return view('admin.index.welcome');
    }
}
