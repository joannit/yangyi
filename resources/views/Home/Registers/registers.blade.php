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
  <title>前台 - 登录 / 注册</title> 
  <style type="text/css">
  .cur{border:1px solid red;}
  </style>
 </head> 
 <body> 
  	@if(session('error'))
      <div class="alert alert-danger" >
                  <button class="close" data-dismiss="alert"></button>
                  <strong>{{session('error')}}</strong>
        	    </div>
      
    @endif
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
         <input class="form-control phone" name="phone" id="login_phone" required="" placeholder="请输入手机号" maxlength="11" autocomplete="off" type="text" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
         </div> 
         <input class="form-control password" name="password" id="login_pwd" placeholder="请输入密码" autocomplete="off" type="text" /> 
         <div class="input-group-addon pwd-toggle" title="隐藏密码">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
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
         <div class="alert alert-warning alert-dismissible fade in" role="alert"> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
          <strong>手机号码为空</strong> 请输入手机号码
         </div>
        </div> 
       </div> 
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="login_submit" type="button">登录</button>
       <br /> 
       <p class="text-center">没有账号？<a href="javascript:;" id="register">免费注册</a></p> 
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
    <div class="form-box register" style="display: block;" style=""> 
     <div class="tabs-nav" style=""> 
      <h2>欢迎注册<a href="/logins/create" class="pull-right fz16" id="reglogin">返回登录</a></h2> 
     </div> 
     <div class="tabs_container"> 


     <!--注册开始-->

      <form class="tabs_form" onsubmit="return" action="/registers" method="post" id="register_form" style=""> 
      	<div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 
         </div> 
         <input class="form-control email" name="email" id="register_email" maxlength="" required="" placeholder="邮箱"  autocomplete="off" type="text" value="{{old('email')}}"/><span></span>
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
         </div> 
         <input class="form-control password" name="user_password" id="register_pwd" placeholder="请输入密码" autocomplete="off" type="text" maxlength="18" value="{{old('user_password')}}"/> 
         <div class="input-group-addon pwd-toggle" title="隐藏密码">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
         </div> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
         </div> 
         <input class="form-control password" name="user_password" id="register_rpwd" placeholder="重复密码" autocomplete="off" type="text" maxlength="18" value="{{old('user_password')}}"/> 
         <div class="input-group-addon pwd-toggle" title="隐藏密码">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
         </div> 
        </div> 
       </div> 

       <div class="row">
		<div class="form-group">
		<div class="col-md-12">
		<label>验证码</label>
		<img src="/code" onclick="this.src=this.src+'?a=1'">
		</div>
		</div>
		</diV>

		<div class="form-group"> 
        <div class="input-group">  
         <input class="form-control fcode" name="fcode" id="register_fcode" maxlength="16" required="" placeholder="请输入验证码"  autocomplete="off" type="text"  style="" /><span></span>
        </div> 
       </div>

       <div class="checkbox"> 
        <label> <input checked="" id="register_checkbox" type="checkbox" /><i></i> 同意<a href="temp_article/udai_article3.html">U袋网用户协议</a><a href="/homeregister" class="btn btn green">手机号注册</a></label> 
       </div> 
       <!-- 错误信息 --> 
       <div class="form-group"> 

        <div class="error_msg" id="registers_error"></div> 
       </div> 
       {{csrf_field()}}
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="register_submit" type="submit">注册</button> 
      </form>

     <!--注册结束-->

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
    <div class="form-box resetpwd"> 
     <div class="tabs-nav clearfix"> 
      <h2>找回密码<a href="javascript:;" class="pull-right fz16" id="pwdlogin">返回登录</a></h2> 
     </div> 
     <div class="tabs_container"> 
      <form class="tabs_form" action="https://rpg.blue/member.php?mod=logging&amp;action=login" method="post" id="resetpwd_form"> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 
         </div> 
         <input class="form-control phone" name="phone" id="resetpwd_phone" required="" placeholder="手机号" maxlength="11" autocomplete="off" type="text" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 

         <input class="form-control" name="sms" id="resetpwd_sms" placeholder="输入验证码" type="text" /> 
         <span class="input-group-btn"> <button class="btn btn-primary getsms" type="button">发送短信验证码</button> </span> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
         </div> 
         <input class="form-control password" name="password" id="resetpwd_pwd" placeholder="新的密码" autocomplete="off" type="password" /> 
         <div class="input-group-addon pwd-toggle" title="显示密码">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
         </div> 
        </div> 
       </div> 
       <!-- 错误信息 --> 
       <div class="form-group"> 
        <div class="error_msg" id="resetpwd_error"></div> 
       </div> 
       <button class="btn btn-large btn-primary btn-lg btn-block submit" id="resetpwd_submit" type="button">重置密码</button> 
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
    
   </div> 
  </div> 
  <div class="f container clearfix" style="margin-top:20px"> 
   
   <!-- 版权 --> 
   <p class="copyright"> &copy; 2005-2017 U袋网 版权所有，并保留所有权利<br /> ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com </p> 
   
  </div> 
 </body>
 <script>
 	//验证邮箱
 	flag=false;
 	$("#register_email").blur(function(){ 
 		email=$(this).val();
 		//alert(email);
 		if(email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
 			//和数据库做匹配
 			$.get("/doemail",{email:email},function(data){ 
 				if(data==1){ 
 					$('#registers_error').html('邮箱已经被注册').css('color','red');
 					flag=false;
 				}else{ 
					$('#registers_error').html('邮箱可用').css('color','green');
					flag=true;
 				}
 			})
		}else{ 

			$('#registers_error').html('邮箱不合法').css('color','red');
			flag=false;
		}
 	});
 	password=false;
 	//验证密码
 	$("#register_pwd").blur(function(){
			//if(p_hone==true && n_ame == true){ 
				//result = true
			//}else{ 
				//result=false;
			//}
			pwd=$(this).val();
			if(pwd.match(/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/)){ 
				$("#registers_error").html('密码可用').css('color','green');
				password=true;
			}else{ 
				$("#registers_error").html('密码格式必须是6到18位的数字和字母下划线组成').css('color','red');
				password=false;
			}
			//console.log(p_wd);
			//console.log(result);
		});
 	passwords=false;
 	//验证重复密码
 	$('#register_rpwd').blur(function(){ 
 		rpwd=$(this).val();

 		pwd=$("#register_pwd").val();
 		//alert(pwd);
 		if(rpwd==pwd){ 
 			$("#registers_error").html('密码一致').css('color','green');
 			passwords=true;	
 		}else{ 
 			$("#registers_error").html('密码不一致').css('color','red');
 			passwords=false;
 		}
 	});
 	//点击提示框隐藏
 	$('.alert').click(function(){ 

 		$(this).hide();
 	});
	//注册按钮提交时匹配所有规则	
	$(".tabs_form").submit(function(){ 
		$('#register_email').trigger('blur');
		$('#register_pwd').trigger('blur');
		$('#register_rpwd').trigger('blur');
		if(flag==true && password==true && passwords==true){ 
			return true;
		}else{ 
			return false;
		}
	})

</script> 
