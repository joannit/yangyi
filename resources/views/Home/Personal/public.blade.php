@extends('Home.public')
@section('main')
<div class="top-user">
			<div class="inner">
				<a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">个人中心</div>
			</div>
		</div>
<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="pull-left bgf">
				<a href="/personal" class="title">U袋欢迎页</a>
				<dl class="user-center__nav">
					<dt>帐户信息</dt>
					<a href="/personal/{{session('user')['id']}}/edit"><dd>个人资料</dd></a>
					<a href="/paddress"><dd>收货地址</dd></a>
					<a href="/couponss"><dd>我的优惠券</dd></a>
					<a href="/editpwd"><dd>修改登录密码</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>订单中心</dt>
					<a href="/house"><dd>我的收藏</dd></a>
					<a href="/myorder"><dd>我的订单</dd></a>
					<!-- <a href="udai_refund.html"><dd>退款/退货</dd></a> -->
				</dl>
				<dl class="user-center__nav">
					<dt>服务中心</dt>
					<a href="/express"><dd>物流查询</dd></a>
				</dl>
			</div>
@section('right')
@show
		</section>
	</div>
@endsection
