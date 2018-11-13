<?php

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


// 后台登录和退出
Route::resource('/adminlogin','Admin\AdminLoginController');

// 登录全向管理
Route::group(['middleware'=>'adminlogin'],function(){

    // 后台首页
    Route::get("/admin",'Admin\AdminController@index');


    //前台用户(会员)管理路由
    Route::resource ("/admin/user","Admin\UserController");


    // 后台用户管理
    Route::resource("/admin/master",'Admin\MasterController');
    // 分配权限

    Route::resource("/adminpower","Admin\PowerController");

    // 后台用户密码修改
    Route::get('/admineditpwd','Admin\MasterController@admineditpwd');
    // 执行密码修改
    Route::post('/adminupdatepwd','Admin\MasterController@adminupdatepwd');
    // 后台用户手机号修改
    Route::get('/admineditpho','Admin\MasterController@admineditpho');
    // 执行号码修改
    Route::post('/adminupdatepho','Admin\MasterController@adminupdatepho');

});

