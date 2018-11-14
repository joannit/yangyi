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

Route::get('/admin',function(){
    return view('Admin.index');
});
// 后台商品分类
Route::resource('/admin/type','Admin\TypeController');
// 后台商品模块
Route::resource('/admin/goods','Admin\GoodsController');
// 后台公告模块
Route::resource('/admin/notice','Admin\NoticeController');
//后台公告ajax删除
Route::get('/noticedel','Admin\NoticeController@del');
// 前台首页
Route::resource('/','Home\IndexController');
//前台公告
Route::get('/home/notice','Home\IndexController@notice');
// 前台分类页
Route::resource('/home/type','Home\TypeController');


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

