@extends('Home.Personal.public')
@section('right')
<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-修改登陆密码</div>
					<div class="step-flow-box">
						<div class="step-flow__bd">
							<div class="step-flow__li step-flow__li_done">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">输入旧密码</p>
							</div>
							<div class="step-flow__line step-flow__line_ing">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">重置登陆密码</p>
							</div>
							<div class="step-flow__line">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">完成</p>
							</div>
						</div>
					</div>
					<form action="/editpwds" class="user-setting__form" role="form" method="post">
						<div class="form-group">
							<input class="form-control" name="user_password" required="" maxlength="11" autocomplete="off" type="password">
							<span class="tip-text">请输入原密码</span>
							<span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
							<span class="error_tip"></span>
						</div>
						<div class="user-form-group tags-box">
							{{csrf_field()}}
							<button type="submit" class="btn ">提交</button>
							
						</div>
						<script src="js/login.js"></script>
						<script>
							$(document).ready(function(){
								$('.form-control').on('blur focus',function() {
									$(this).addClass('focus');
									$('.error_tip').empty();
									if ($(this).val() == ''){$(this).removeClass('focus')}
								});
							});
						</script>
					</form>
				</div>
			</div>
@endsection
@section('title','修改密码')