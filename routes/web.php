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
    // 后台商品分类
    Route::resource('/admin/type','Admin\TypeController');
    // 后台商品模块
    Route::resource('/admin/goods','Admin\GoodsController');
    // 后台公告模块
    Route::resource('/admin/notice','Admin\NoticeController');
   	//后台友情链接
   	Route::resource('/admin/link','Admin\LinkController');
   	//后台广告模块
   	Route::resource('/adminadvent','Admin\AdventController');
   	//后台优惠券模块
   	Route::resource('/coupons','Admin\CouponsController');
   	//优惠用户关联模块
   	Route::resource('/couponsuser','Admin\CouponsuserController');
   	//优惠券过期时间处理
   	Route::get('/times','Admin\CouponsController@timess');

});
 //后台公告ajax删除
    Route::get('/noticedel','Admin\NoticeController@del');

//前台
Route::resource("/homeregister","Home\HomeRegisterController");
//前台注册
Route::get("/regits","Home\HomeRegisterController@regits");
//短信验证
Route::get("/phone","Home\HomeRegisterController@phone");
//发送验证
Route::get("/codes","Home\HomeRegisterController@code");
//校验手机
Route::get("/dophone","Home\HomeRegisterController@dophone");
//注册成功去登录
Route::post("/doregister","Home\HomeRegisterController@doregister");
//角色列表ajax状态修改
Route::get("/ajaxedit","Admin\RolelistController@ajax");
//用户列表状态修改
Route::get("/ajaxuser","Admin\AdminuserController@ajaxuser");
//前台登录
Route::resource("/homelogin","Home\HomeLoginController");
//前台密码找回
Route::resource('/homereset','Home\HomeresetController');
//前台友情链接
Route::resource("/link","Home\LinkController");
//前台邮箱激活用户
Route::resource('/registers','Home\RegistersController');
//引入验证码
Route::get('/code','Home\RegistersController@codes');
//验证邮箱
Route::get('/doemail','Home\RegistersController@doemail');
//激活邮箱
Route::get('/jihuo','Home\RegistersController@jihuo');
//邮箱登录
Route::resource('/logins','Home\LoginsController');
//邮箱登录引入验证码
Route::get('/codess','Home\LoginsController@codes');