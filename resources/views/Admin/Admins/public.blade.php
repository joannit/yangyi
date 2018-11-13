<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>@yield('title')</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="/static/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="/static/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="/static/admin/css/login-soft.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="/static/admin/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

	<!-- BEGIN LOGO -->

	<div class="logo">

		<img src="/static/admin/image/logo-big.png" alt="" />

	</div>

	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->
	<!-- 主体 -->
	@section('main')


	@show


	<!-- END LOGIN -->

	<!-- BEGIN COPYRIGHT -->

	<div class="copyright">

		2018 &copy; Metronic - Admin Dashboard Template.

	</div>

	<!-- END COPYRIGHT -->

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

	<script src="/static/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="/static/admin/js/jquery.validate.min.js" type="text/javascript"></script>

	<script src="/static/admin/js/jquery.backstretch.min.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="/static/admin/js/app.js" type="text/javascript"></script>

	<script src="/static/admin/js/login-soft.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS -->


	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>