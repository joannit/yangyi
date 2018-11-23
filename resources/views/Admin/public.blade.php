<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->

<html lang="en">
 <!--<![endif]-->
 <!-- BEGIN HEAD -->
 <head>
  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/datetimepicker.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/style.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="/static/admin/css/select2_metro.css" />
  <link rel="stylesheet" href="/static/admin/css/DT_bootstrap.css" />
  <!-- END PAGE LEVEL STYLES -->
  <link rel="shortcut icon" href="/static/admin/image/favicon.ico" />
 </head>
 <!-- END HEAD -->
 <!-- BEGIN BODY -->
 <body class="page-header-fixed">
  <!-- BEGIN HEADER -->
  <div class="header navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="navbar-inner">
    <div class="container-fluid">
     <!-- BEGIN LOGO -->
     <a class="brand" href="index.html"> <img src="/static/admin/image/logo.png" alt="logo" /> </a>
     <!-- END LOGO -->
     <!-- BEGIN RESPONSIVE MENU TOGGLER -->
     <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"> <img src="/static/admin/image/menu-toggler.png" alt="" /> </a>
     <!-- END RESPONSIVE MENU TOGGLER -->
     <!-- BEGIN TOP NAVIGATION MENU -->
     <ul class="nav pull-right">
      <!-- BEGIN NOTIFICATION DROPDOWN -->





      <!-- END TODO DROPDOWN -->
      <!-- BEGIN USER LOGIN DROPDOWN -->
      <li class="dropdown user" id="xiugai"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="/static/admin/image/avatar1_small.jpg" /> <span class="username">{{session('admin_name')}}</span> <i class="icon-angle-down"></i> </a>
       <ul class="dropdown-menu" id="xianshi">
        <li><a href="/admineditpwd" ><i class="icon-user"></i> 密码修改</a></li> <li><a href="/admineditpho"><i class="icon-user" class="lll"></i> 手机号码修改</a></li>

        <li><a href="/adminlogin" ><i class="icon-key"></i> 退出</a></li>
       </ul> </li>
      <!-- END USER LOGIN DROPDOWN -->
     </ul>

     <!-- END TOP NAVIGATION MENU -->
    </div>
   </div>
   <!-- END TOP NAVIGATION BAR -->
  </div>
  <!-- END HEADER -->
  <!-- BEGIN CONTAINER -->
  <div class="page-container row-fluid">
   <!-- BEGIN SIDEBAR -->
   <div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu">
     <li>
      <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
      <div class="sidebar-toggler hidden-phone"></div>
      <!-- BEGIN SIDEBAR TOGGLER BUTTON --> </li>
     <li>
      <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <!--   <form class="sidebar-search">
       <div class="input-box">
        <a href="javascript:;" class="remove"></a>
        <input type="text" placeholder="Search..." />
        <input type="button" class="submit" value=" " />
       </div>
      </form> -->
      <!-- END RESPONSIVE QUICK SEARCH FORM --> </li>
     <li class="start active "> <a href="/admin"> <i class="icon-home"></i> <span class="title">主页</span> <span class="selected"></span> </a> </li>


      <li class=""> <a href="javascript:;"> <i class="icon-user"></i> <span class="title">管理员管理 </span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/master"> 管理员列表</a> </li>
       <li> <a href="/admin/master/create"> 添加管理员</a> </li>
      <!--  <li> <a href=""> 权限管理</a> </li>
 -->      </ul>
      </li>
     <li class=""> <a href="javascript:;"> <i class="icon-user"></i> <span class="title">会员管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/user"> 会员列表</a></li>
        <li> <a href="/admin/user/create">添加会员</a></li>
      </ul> </li>
     <li> <a class="active" href="javascript:;"> <i class="icon-sitemap"></i> <span class="title">分类管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/type"> 分类列表 </a> </li>
       <li> <a href="/admin/type/create"> 添加分类 </a> </li>
      </ul> </li>
     <li> <a class="active" href="javascript:;"> <i class="icon-gift"></i> <span class="title">商品管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/goods"> 商品列表 </a> </li>
       <li> <a href="/admin/goods/create"> 添加商品 </a> </li>
      </ul> </li>
     <li> <a class="active" href="javascript:;"> <i class="icon-file-text"></i> <span class="title">订单管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/order"> 订单列表 </a> </li>
      </ul> </li>
     <li> <a class="active" href="javascript:;"> <i class="icon-thumbs-up"></i> <span class="title">评价管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/admin/comment"> 评价列表 </a> </li>

      </ul> </li>
      <li> <a class="active" href="javascript:;"> <i class="icon-thumbs-up"></i> <span class="title">优惠券管理</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="/coupons"> 优惠券列表 </a> </li>
       <li> <a href="/coupons/create"> 添加优惠券 </a> </li>
        <li> <a href="/couponsuser">用户关联表</a> </li>
      </ul> </li>
     <li> <a class="active" href="javascript:;"> <i class="icon-cogs"></i> <span class="title">前台首页</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
       <li> <a href="#"> 轮播图设置 </a> </li>
       <li> <a href="/admin/link"> 友情链接 </a> </li>
       <li> <a href="/adminadvent"> 广告设置 </a> </li>
       <li> <a href="/admin/notice"> 公告 </a> </li>
       <li> <a href="/admin/message"> 站内信 </a> </li>
      </ul> </li>
    </ul>
    <!-- END SIDEBAR MENU -->
   </div>
   <!-- END SIDEBAR -->
   <!-- BEGIN PAGE -->
   <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
     <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>portlet Settings</h3>
     </div>
     <div class="modal-body">
      <p>Here will be a configuration form</p>
     </div>
    </div>
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
    <!-- 表单错误抛出 -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif


    @if (session ('success'))
      <div class="alert alert-success">

    <button class="close" data-dismiss="alert"></button>

    <strong>{{session('success')}}!</strong>

  </div>
    @endif

    @if (session ('error'))
      <div class="alert alert-error">

    <button class="close" data-dismiss="alert"></button>

    <strong>{{session('error')}}!</strong>

  </div>
    @endif

<!-- 表单错误抛出结束 -->
      @section('main')


      @show
    <!-- END PAGE CONTAINER-->
   </div>
   <!-- END PAGE -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
   <div class="footer-inner">
     2018 &copy; Metronic by keenthemes.Collect from
    <a href="http://www.cssmoban.com/" title="网站模板" target="_blank">网站模板</a> - More Templates
    <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a>
   </div>
   <div class="footer-tools">
    <span class="go-top"> <i class="icon-angle-up"></i> </span>
   </div>
  </div>
  <!-- END FOOTER -->
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="/static/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="/static/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="/static/admin/js/bootstrap.min.js" type="text/javascript"></script>
  <!--[if lt IE 9]>

  <script src="/static/admin/js/excanvas.min.js"></script>

  <script src="/static/admin/js/respond.min.js"></script>

  <![endif]-->
  <script src="/static/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="/static/admin/js/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="/static/admin/js/jquery.cookie.min.js" type="text/javascript"></script>
  <script src="/static/admin/js/jquery.uniform.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/static/admin/js/jquery.js"></script>
  <script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/static/admin/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/static/admin/js/bootstrap-datetimepicker.fr.js"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script type="text/javascript" src="/static/admin/js/select2.min.js"></script>
  <script type="text/javascript" src="/static/admin/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="/static/admin/js/DT_bootstrap.js"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="/static/admin/js/app.js"></script>
  <script src="/static/admin/js/table-editable.js"></script>
  <script>

  	$('#datetimepicker').datetimepicker();
  	$('#datetimepickers').datetimepicker();
    jQuery(document).ready(function() {

       App.init();

       TableEditable.init();

    });


    // alert($);

    $('#xiugai').click(function(){
        $('#xianshi').css('display','block');

    });

    $('#xiugai').dblclick(function(){
        $('#xianshi').css('display','none');
        // alert(33);
    });


    // $('.dropdown-menu').attr('display','block');
  </script>
  <!-- END BODY -->
 </body>
</html>