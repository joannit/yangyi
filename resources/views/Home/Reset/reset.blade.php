<html lang="zh-cmn-Hans">
 <head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" href="/static/home/css/iconfont.css" />
  <link rel="stylesheet" href="/static/home/css/global.css" />
  <link rel="stylesheet" href="/static/home/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/static/home/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="/static/home/css/login.css" />
  <script src="/static/home/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
  <script src="/static/home/js/bootstrap.min.js" charset="UTF-8"></script>
  <script src="/static/home/js/jquery.form.js" charset="UTF-8"></script>
  <script src="/static/home/js/global.js" charset="UTF-8"></script>
  <script src="/static/home/js/login.js" charset="UTF-8"></script>
  <title>U袋网 - 登录 / 注册</title>
 </head>
 <body>
  <div class="public-head-layout container">
   <a class="logo" href="index.html"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover" /></a>
  </div>
  <div style="background:url(/static/home/images/login_bg.jpg) no-repeat center center; ">
   <div class="login-layout container">
    <div class="form-box login" style="display: none;">
     <div class="tabs-nav">
      <h2>欢迎登录U袋网平台</h2>
     </div>
     <div class="tabs_container">
      <form class="tabs_form" action="" method="post" id="login_form">
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
         </div>
         <input class="form-control phone" name="phone" id="login_phone" required="" placeholder="手机号" maxlength="11" autocomplete="off" type="text" />
        </div>
       </div>
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
         </div>
         <input class="form-control password" name="password" id="login_pwd" placeholder="请输入密码" autocomplete="off" type="password" />
         <div class="input-group-addon pwd-toggle" title="显示密码">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
         </div>
        </div>
       </div>
       <div class="checkbox">
        <label> <input checked="" id="login_checkbox" type="checkbox" /><i></i> 30天内免登录 </label>
        <a href="javascript:;" class="pull-right" id="resetpwd">忘记密码？</a>
       </div>
       <!-- 错误信息 -->
       <div class="form-group">
        <div class="error_msg" id="login_error">
         <!-- 错误信息 范例html
								<div class="alert alert-warning alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>密码错误</strong> 请重新输入密码
								</div>
								 -->
        </div>
       </div>
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="login_submit" type="button">登录</button>
       <br />
       <p class="text-center">没有账号？<a href="/homeregister" id="register">免费注册</a></p>
      </form>
      <div class="tabs_div">
       <div class="success-box">
        <div class="success-msg">
         <i class="success-icon"></i>
         <p class="success-text">登录成功</p>
        </div>
       </div>
       <div class="option-box">
        <div class="buts-title">
          现在您可以
        </div>
        <div class="buts-box">
         <a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
         <a role="button" href="udai_welcome.html" class="btn btn-block btn-lg btn-info">登录会员中心</a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="form-box register">
     <div class="tabs-nav">
      <h2>欢迎注册<a href="javascript:;" class="pull-right fz16" id="reglogin">返回登录</a></h2>
     </div>
     <div class="tabs_container">
      <form class="tabs_form" action="index.html" method="post" id="register_form">
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
         </div>
         <input class="form-control phone" name="phone" id="register_phone" required="" placeholder="手机号" maxlength="11" autocomplete="off" type="text" />
        </div>
       </div>
       <div class="form-group">
        <div class="input-group">
         <input class="form-control" name="smscode" id="register_sms" placeholder="输入验证码" type="text" />
         <span class="input-group-btn"> <button class="btn btn-primary getsms" type="button">发送短信验证码</button> </span>
        </div>
       </div>
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
         </div>
         <input class="form-control password" name="password" id="register_pwd" placeholder="请输入密码" autocomplete="off" type="password" />
         <div class="input-group-addon pwd-toggle" title="显示密码">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
         </div>
        </div>
       </div>
       <div class="checkbox">
        <label> <input checked="" id="register_checkbox" type="checkbox" /><i></i> 同意<a href="temp_article/udai_article3.html">U袋网用户协议</a> </label>
       </div>
       <!-- 错误信息 -->
       <div class="form-group">
        <div class="error_msg" id="register_error"></div>
       </div>
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="register_submit" type="button">注册</button>
      </form>
      <div class="tabs_div">
       <div class="success-box">
        <div class="success-msg">
         <i class="success-icon"></i>
         <p class="success-text">注册成功</p>
        </div>
       </div>
       <div class="option-box">
        <div class="buts-title">
          现在您可以
        </div>
        <div class="buts-box">
         <a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
         <a role="button" href="udai_welcome.html" class="btn btn-block btn-lg btn-info">登录会员中心</a>
        </div>
       </div>
      </div>
     </div>
    </div>

    <!--密码找回-->
    <div class="form-box resetpwd" style="display: block;">
     <div class="tabs-nav clearfix">
      <h2>找回密码<a href="/login" class="pull-right fz16" id="pwdlogin">返回登录</a></h2>
     </div>
     <div class="tabs_container">
      <form class="tabs_form" action="/doreset" method="post" id="resetpwd_form">
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
         </div>
         <input class="form-control phone" name="user_phone" id="resetpwd_phone" required="" placeholder="手机号" maxlength="11" autocomplete="off" type="text" />
        </div>
       </div>
       <div class="form-group">
        <div class="input-group">
         <input class="form-control" name="sms" id="resetpwd_sms" placeholder="输入验证码" type="text" />
         <span class="input-group-btn"> <button class="btn btn-primary getsms" type="button" id="btns">发送短信验证码</button> </span>
        </div>
       </div>
       <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon">
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
         </div>
         <input class="form-control password" name="user_password" id="resetpwd_pwd" placeholder="新的密码" autocomplete="off" type="password" />
         <div class="input-group-addon pwd-toggle" title="显示密码">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
         </div>
        </div>
       </div>
       <!-- 错误信息 -->
       <div class="form-group">

        <div class="error_msg" id="resetpwd_error"></div>

       </div>
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="resetpwd_submit" type="submit">重置密码</button>
      </form>


      <div class="tabs_div">
       <div class="success-box">
        <div class="success-msg">
         <i class="success-icon"></i>
         <p class="success-text">密码重置成功</p>
        </div>
       </div>
       <div class="option-box">
        <div class="buts-title">
          现在您可以
        </div>
        <div class="buts-box">
         <a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
         <a role="button" href="login.html" class="btn btn-block btn-lg btn-info">返回登陆</a>
        </div>
       </div>
      </div>
     </div>
    </div>
    <script>
    //验证手机号
    p_wd = false;
    p_hone=false;
   	//var timmer;
   	PHONE=false;
   	$("#resetpwd_phone").blur(function(){
   		phone=$("#resetpwd_phone").val()
			//alert(phone);
			if(phone.match(/^1[3|4|5|7|8][0-9]\d{8}$/)){
			////alert(phone)
			$.get("/dophones",{user_phone:phone},function(data){
				if(data==1){
					$("#resetpwd_error").html('手机号可用').css('color','green');
					$("#btns").attr('disabled',false);
					PHONE=true;

				}else{
					$("#resetpwd_error").html('手机号未注册').css('color','red');
					$("#btns").attr('disabled',true);
					PHONE=false;
				}
			},'json')

			}else{
			$("#resetpwd_error").html('请输入正确的手机号').css('color','red');
				$("#btns").attr('disabled',true);
				PHONE=false;
			}

   	});
   	//result=false;
	var timmer;
		$('#btns').click(function(){

			//获取输入的手机号码
			obj=$(this);
			//tel=$('#register_phone').val()
			phone=$("#resetpwd_phone").val()
			//匹配正则手机号
			//if(phone.match(/^1[3|4|5|7|8][0-9]\d{4,8}$/)){
			//alert(phone)
			$.get("/phones",{user_phone:phone},function(data){
					//alert(data.code);
					if(data.code==000000){
						m=60;
						timmer=setInterval(function(){
						m--;
						//赋值给按钮
						obj.html(m+"秒后重新发送")
						//按钮禁用
						obj.attr('disabled',true)
						if(m==0){
							//清除定时器
							clearInterval(timmer);
							//重新赋值
							obj.html('重新发送');
							//按钮激活
							obj.attr('disabled',false);
							}
						},1000);
					}
			},'json')
		});

		// p_hone=false;
		$("#resetpwd_sms").blur(function(){
			//获取验证码
			code=$(this).val();
			//alert(code);
			//AJAX传值
			$.get('/code',{code:code},function(data){

				if(data==1){
					$("#resetpwd_error").html('验证码正确').css('color','green');
					p_hone = true;
				}else if(data==2){
					$("#resetpwd_error").html('验证码有误').css('color','red');
					p_hone=false;
				}else if(data==3){
					$("#resetpwd_error").html('验证码为空').css('color','red');
					p_hone=false;
				}else if(data==4){
					$("#resetpwd_error").html('验证码已过期请重新发送');
					p_hone=false;
				}
			});
		});
		//var p_wd = false;
		$("#resetpwd_pwd").blur(function(){
			pwd=$(this).val();
			if(pwd.match(/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/)){
				$("#resetpwd_error").html('');
				p_wd = true;
			}else{
				$("#resetpwd_error").html('密码格式必须是6到18位的数字和字母下划线组成').css('color','red');
				p_wd=false;
			}
			//console.log(p_wd);
			//console.log(result);
		})
		//注册按钮提交时匹配所有规则
		$(".tabs_form").submit(function(){
			//符合所有条件可以提交

			$("#resetpwd_pwd").trigger("blur");
			$("#resetpwd_sms").trigger("blur");
			$('#resetpwd_phone').trigger("blur");
			if(PHONE == true && p_wd == true && p_hone){
				return true;
			}else{
				return false;
			}
		});
	</script>
   </div>
  </div>
  <div class="footer-login container clearfix">
   <ul class="links">
    <a href=""><li>网店代销</li></a>
    <a href=""><li>U袋学堂</li></a>
    <a href=""><li>联系我们</li></a>
    <a href=""><li>企业简介</li></a>
    <a href=""><li>新手上路</li></a>
   </ul>
   <!-- 版权 -->
   <p class="copyright"> &copy; 2005-2017 U袋网 版权所有，并保留所有权利<br /> ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com </p>
  </div>
 </body>
</html>