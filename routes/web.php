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

//前台注册页面
Route::resource("/homeregister","Home\HomeRegisterController");
//前台注册
Route::get("/regits","Home\HomeRegisterController@regits");
// //短信验证
Route::get("/phone","Home\HomeRegisterController@phone");
// //发送验证
Route::get("/code","Home\HomeRegisterController@code");
// //校验手机
Route::get("/dophone","Home\HomeRegisterController@dophone");
// //注册成功去登录
Route::post("/doregister","Home\HomeRegisterController@doregister");
// //角色列表ajax状态修改
Route::get("/ajaxedit","Admin\RolelistController@ajax");
// //用户列表状态修改
Route::get("/ajaxuser","Admin\AdminuserController@ajaxuser");
// //前台登录
Route::resource("/login","Home\HomeLoginController");
// // 前台退出
Route::get("/outlogin","Home\HomeLoginController@outlogin");
// 前台首页
Route::resource('/','Home\IndexController');
// //前台公告
Route::get('/home/notice','Home\IndexController@notice');
// 前台分类页
Route::resource('/home/type','Home\TypeController');

                    // -----个人中心----
// 前台个人中心
Route::resource('/personal','Home\PersonalController');
// 前台个人中心收货地址
Route::get('/paddress','Home\PersonalController@address');
// 消息
Route::get('/message','Home\PersonalController@message');
// 删除消息
Route::get('/delmessage/{id}','Home\PersonalController@delmessage');
// ajax城市级联
Route::get('/city','Home\PersonalController@city');
// 处理地址添加
Route::post('/paddress/add','Home\PersonalController@createadd');
// 地址设为默认
Route::get('/paddress/default/{id}','Home\PersonalController@default');
// 删除地址
Route::get('/paddress/deladdress/{id}','Home\PersonalController@deladdress');
// 修改地址页面
Route::get('/paddress/editadd/{id}','Home\PersonalController@editadd');
// 处理地址修改
Route::post('/paddress/doeditadd','Home\PersonalController@doeditadd');
// 修改登录密码
Route::get('/editpwd','Home\PersonalController@editpwd');
// 验证密码
Route::post('/editpwds','Home\PersonalController@editpwds');
// 处理修改密码
Route::post('/doeditpwd','Home\PersonalController@doeditpwd');


                            // end-----个人中心----
// 购物车
Route::resource('/cart','Home\CartController');
// 购物车数量加方法
Route::get('/cartadd','Home\CartController@numadd');
// 购物车删除方法
Route::get('/cartdel','Home\CartController@cartdel');
// 购物车选择删除方法
Route::get('/cartdels','Home\CartController@cartdels');
// 后台登录和退出
Route::resource('/adminlogin','Admin\AdminLoginController');

    Route::resource("/homeregister","Home\HomeRegisterController");
    //前台注册
    Route::get("/regits","Home\HomeRegisterController@regits");
    //短信验证
    Route::get("/phone","Home\HomeRegisterController@phone");
    //发送验证
    Route::get("/code","Home\HomeRegisterController@code");
    //校验手机
    Route::get("/dophone","Home\HomeRegisterController@dophone");
    //注册成功去登录
    Route::post("/doregister","Home\HomeRegisterController@doregister");
    //角色列表ajax状态修改
    Route::get("/ajaxedit","Admin\RolelistController@ajax");
    //用户列表状态修改
    Route::get("/ajaxuser","Admin\AdminuserController@ajaxuser");
    //前台登录
    Route::resource("/login","Home\HomeLoginController");
    // 前台退出
    Route::get("/outlogin","Home\HomeLoginController@outlogin");
    // 前台首页
    Route::resource('/','Home\IndexController');
    //前台公告
    Route::get('/home/notice','Home\IndexController@notice');
    // 前台分类页
    Route::resource('/home/type','Home\TypeController');

                        // -----个人中心----
    // 前台个人中心
    Route::resource('/personal','Home\PersonalController');
    // 前台个人中心收货地址
    Route::get('/paddress','Home\PersonalController@address');
    // 消息
    Route::get('/message','Home\PersonalController@message');
    // 删除消息
    Route::get('/delmessage/{id}','Home\PersonalController@delmessage');
    // ajax城市级联
    Route::get('/city','Home\PersonalController@city');
    // 处理地址添加
    Route::post('/paddress/add','Home\PersonalController@createadd');
    // 地址设为默认
    Route::get('/paddress/default/{id}','Home\PersonalController@default');
    // 删除地址
    Route::get('/paddress/deladdress/{id}','Home\PersonalController@deladdress');
    // 修改地址页面
    Route::get('/paddress/editadd/{id}','Home\PersonalController@editadd');
    // 处理地址修改
    Route::post('/paddress/doeditadd','Home\PersonalController@doeditadd');
    // 修改登录密码
    Route::get('/editpwd','Home\PersonalController@editpwd');
    // 验证密码
    Route::post('/editpwds','Home\PersonalController@editpwds');
    // 处理修改密码
    Route::post('/doeditpwd','Home\PersonalController@doeditpwd');


                                // end-----个人中心----
    // 购物车
    Route::resource('/cart','Home\CartController');
    // 购物车数量加方法
    Route::get('/cartadd','Home\CartController@numadd');
    // 购物车删除方法
    Route::get('/cartdel','Home\CartController@cartdel');
    // 后台登录和退出
    Route::resource('/adminlogin','Admin\AdminLoginController');
// 后台登录权限管理
Route::group(['middleware'=>'adminlogin'],function(){

    //前台注册页面
    Route::resource("/homeregister","Home\HomeRegisterController");
    //前台注册
    Route::get("/regits","Home\HomeRegisterController@regits");
    //短信验证
    Route::get("/phone","Home\HomeRegisterController@phone");
    //发送验证
    Route::get("/code","Home\HomeRegisterController@code");
    //校验手机
    Route::get("/dophone","Home\HomeRegisterController@dophone");
    //注册成功去登录
    Route::post("/doregister","Home\HomeRegisterController@doregister");
    //角色列表ajax状态修改
    Route::get("/ajaxedit","Admin\RolelistController@ajax");
    //用户列表状态修改
    Route::get("/ajaxuser","Admin\AdminuserController@ajaxuser");
    //前台登录
    Route::resource("/login","Home\HomeLoginController");
    // 前台退出
    Route::get("/outlogin","Home\HomeLoginController@outlogin");
    // 前台首页
    Route::resource('/','Home\IndexController');
    //前台公告
    Route::get('/home/notice','Home\IndexController@notice');
    // 前台分类页
    Route::resource('/home/type','Home\TypeController');

                        // -----个人中心----
    // 前台个人中心
    Route::resource('/personal','Home\PersonalController');
    // 前台个人中心收货地址
    Route::get('/paddress','Home\PersonalController@address');
    // ajax城市级联
    Route::get('/city','Home\PersonalController@city');
    // 处理地址添加
    Route::post('/paddress/add','Home\PersonalController@createadd');
    // 地址设为默认
    Route::get('/paddress/default/{id}','Home\PersonalController@default');
    // 删除地址
    Route::get('/paddress/deladdress/{id}','Home\PersonalController@deladdress');
    // 修改地址页面
    Route::get('/paddress/editadd/{id}','Home\PersonalController@editadd');
    // 处理地址修改
    Route::post('/paddress/doeditadd','Home\PersonalController@doeditadd');
    // 修改登录密码
    Route::get('/paddress/editpwd','Home\PersonalController@editpwd');
});
                                // end-----个人中心----
    // 后台登录和退出
    Route::resource('/adminlogin','Admin\AdminLoginController');
    // 后台登录权限管理
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


    //后台分类下的品牌
    Route::resource('/admin/brand','Admin\BrandController');
    // 添加商品里的ajax查品牌
    Route::get('/admin/typebrand','Admin\GoodsController@typebrand');
    // 商品下修改商品品牌
    Route::any('/admingb','Admin\GoodsController@changebr');
    // 商品下更新商品品牌
    Route::any('/updatebrand','Admin\GoodsController@updatebr');
    // 商品详情
    Route::resource('/admin/goodsinfo','Admin\GoodsInfoController');

    // 后台评论管理模块
    Route::resource('/admin/comment','Admin\CommentController');

    // 后台站内信模块
    Route::resource('/admin/message','Admin\MessageController');


});
 // 后台公告ajax删除
    Route::get('/noticedel','Admin\NoticeController@del');

D
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


    //前台
    Route::resource("/homeregister","Home\HomeRegisterController");
    //前台注册
    Route::get("/regits","Home\HomeRegisterController@regits");
    //短信验证
    Route::get("/phone","Home\HomeRegisterController@phone");
    // 发送验证
    Route::get("/code","Home\HomeRegisterController@code");
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


    // 前台商品详情

    Route::get('/homegoodsinfo/{id}','Home\Goods\GoodsinfoController@goodsinfo');

    // 订单详情页面点击规格后显示数据处理
    Route::get('/ajaxginfo','Home\Goods\GoodsinfoController@ajaxginfo');
    // 立即购买
    Route::resource('/home/goodsinfo','Home\Goods\GoodsinfoController');
    // 加入购物车
    Route::any('/addcart','Home\Goods\GoodsinfoController@addcart');
    //立即购买支付
    Route::any('/pay','Home\Goods\GoodsinfoController@pay');

    // 支付页设置默认地址
    Route::get('/defaultadd','Home\Goods\GoodsinfoController@defaultadd');

