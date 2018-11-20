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
							<div class="step-flow__line step-flow__li_done">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li step-flow__li_done">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">重置登陆密码</p>
							</div>
							<div class="step-flow__line step-flow__line_ing">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">完成</p>
							</div>
						</div>
					</div>
					<form action="/doeditpwd" class="user-setting__form" role="form" method="post" id="fr">
						<div class="form-group">
							<input class="form-control" name="user_password" required="" maxlength="11" autocomplete="off" type="password">
							<span class="tip-text">新的密码</span>
							<span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
							<font  class="error_tip tip"></font>
						</div>
						<div class="form-group">
						<div class="form-group">
							<input class="form-control" name="repwd" required="" maxlength="11" autocomplete="off" type="password">
							<span class="tip-text">再次确认新的密码</span>
							<span class="see-pwd pwd-toggle" title="显示密码"><i class="glyphicon glyphicon-eye-open"></i></span>
							<font  class="error_tip tip2"></font>
						</div>
						</div>
						<div class="user-form-group tags-box">
							{{csrf_field()}}
							<button type="submit" class="btn ">提交</button>
							
						</div>
						<script src="/static/home/js/login.js"></script>
						<script>
							$(document).ready(function(){
								$('.form-control').on('blur focus',function() {
									$(this).addClass('focus')
									if ($(this).val() == ''){$(this).removeClass('focus')}
								});
							});
						</script>
					</form>
				</div>
			</div>
			<script type="text/javascript">
				var pwd ;
				var result = false;
				$('input[name=user_password]').blur(function(){
					 pwd = $(this).val();
					var ret = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,18}$/;
					if(!ret.test(pwd)){
						$('.tip').attr('color','red');
					$('.tip').html('密码必须为6-18位字母数字下划线组成');
					}else{
						$('.tip').attr('color','green');
						$('.tip').html('OK');
						result=true;
						}
					
				})
				var result2=false;
				$('input[name=repwd]').blur(function(){
					var repwd = $(this).val();
				if(result){
						if(pwd == repwd){
							$('.tip2').attr('color','green');
							$('.tip2').html('OK');
							result2=true;
						}else{
							$('.tip2').attr('color','red');
							$('.tip2').html('两次密码输入不一致');
						}
				}else{
					$('input[name=user_password]').trigger('blur');
					}
				})	
				$('#fr').submit(function(){
					$('input[name=repwd]').trigger('blur');
					if(result && result2){
						return true;
					}else{
						return false;
					}
				})

			</script>
@endsection
@section('title','修改密码')