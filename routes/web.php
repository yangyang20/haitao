<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'admin'],function (){
    Route::get('/','LoginController@Index');
    Route::get('login','LoginController@Index');
    Route::post('doLogin','LoginController@doLogin');
});

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'checkLogin'],function (){
    Route::get('index','IndexController@Index');
    Route::get('welcome','IndexController@Welcome');
    Route::get('loginOut','LoginController@LoginOut');
});


Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'checkLogin'],function (){
    Route::resource("import","ImportTplController");
    Route::get("importOrderIndex","importTplController@importOrderIndex");
    Route::post("importOrderPreview","importTplController@importOrderPreview");
    Route::resource("goods","GoodsController");
});
