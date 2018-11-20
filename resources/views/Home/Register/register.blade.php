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
      <h2>欢迎注册<a href="/homelogin" class="pull-right fz16" id="reglogin">返回登录</a></h2> 
     </div> 
     <div class="tabs_container"> 


     <!--注册开始-->

      <form class="tabs_form" onsubmit="return" action="/doregister" method="post" id="register_form" style=""> 
      	<div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
         </div> 
         <input class="form-control name" name="user_name" id="register_name" maxlength="16" required="" placeholder="账号"  autocomplete="off" type="text"  style="" /><span></span>
        </div> 
       </div> 

       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 
         </div> 
         <input class="form-control phone" name="user_phone" id="register_phone" required="" placeholder="手机号" maxlength="11" autocomplete="off" type="text" style="" /> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <input class="form-control" name="smscode" id="register_sms" placeholder="输入验证码" type="text"  /> 
         <span class="input-group-btn"> <button class="btn btn-primary getsms" type="button" id="btn">发送短信验证码</button> </span> 
        </div> 
       </div> 
       <div class="form-group"> 
        <div class="input-group"> 
         <div class="input-group-addon"> 
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 
         </div> 
         <input class="form-control password" name="user_password" id="register_pwd" placeholder="请输入密码" autocomplete="off" type="text" maxlength="18" /> 
         <div class="input-group-addon pwd-toggle" title="隐藏密码">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
         </div> 
        </div> 
       </div> 
       <div class="checkbox"> 
        <label> <input checked="" id="register_checkbox" type="checkbox" /><i></i> 同意<a href="temp_article/udai_article3.html">U袋网用户协议</a><a href="/registers" class="btn btn green">邮箱注册</a></label> 
       </div> 
       <!-- 错误信息 --> 
       <div class="form-group"> 
        <div class="error_msg" id="register_error"></div> 
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
 
 		var n_ame = false;
 		//var result = false;
    	//$("#register").focus();
    	//获取输入的用户名
		$("#register_name").blur(function(){ 

			name=$(this).val();
			regits=$(this);
			//账号匹配正则
			if(name.match(/^[a-zA-Z][a-zA-Z0-9_]{3,16}$/)){ 
			//alert(name);
			//和数据库的用户名做比较
			$.get("/regits",{user_name:name},function(data){ 

				//alert(data);
				if(data==1){
					//alert("")
					$("#register_error").html(msgtemp('<strong>此用户名太受欢迎,请重新输入</strong> ','alert-warning')).css('color','red');
					n_ame=false;
				}else{ 

					$("#register_error").html('用户名可用').css('color','green');
					n_ame = true;
				}
			});
		}else{ 
			$("#register_error").html('用户名必须是4-16的字母数字下划线组成').css('color','red');	
			n_ame=false;
		}
	});
		//校验手机号
		PHONE=false;
		//var phones=false
		$('#register_phone').blur(function(){ 

			phone=$("#register_phone").val()
			//alert(phone);
			if(phone.match(/^1[3|4|5|7|8][0-9]\d{8}$/)){ 
			////alert(phone)
			$.get("/dophone",{user_phone:phone},function(data){ 
				if(data==1){ 
					$("#register_error").html('手机号已经被注册').css('color','green');
					$("#btn").attr('disabled',true);
					PHONE=false;

				}else{ 
					$("#register_error").html('手机号可用').css('color','green');
					$("#btn").attr('disabled',false);
					PHONE=true;
				}
			},'json')

			}else{ 
			$("#register_error").html('请输入正确的手机号').css('color','red');
				$("#btn").attr('disabled',true);
				PHONE=false;
			}
		});
		//发送验证码
		$('#btn').click(function(){ 

			//获取输入的手机号码
			obj=$(this);
			//tel=$('#register_phone').val()
			phone=$("#register_phone").val();
			$.get("/phone",{user_phone:phone},function(data){ 
	
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
					},1000)
					//}
				}
			},'json')

		//	}else{ 
			//	$("#register_error").html('请输入正确的手机号').css('color','red');

			//}

		});
		//验证码校验
		var p_hone;
		$("#register_sms").blur(function(){ 
			//获取验证码
			code=$(this).val();
			//AJAX传值
			$.get('/codes',{code:code},function(data){ 

				if(data==1){ 
					$("#register_error").html('验证码正确').css('color','green');
					p_hone = true;
				}else if(data==2){ 
					$("#register_error").html('验证码有误').css('color','red');
					p_hone=false;
				}else if(data==3){ 
					$("#register_error").html('验证码为空').css('color','red');
					p_hone=false;
				}else if(data==4){ 
					$("#register_error").html('验证码已过期请重新发送');
					p_hone=false;
				}
			})
		})
		//验证密码
		var p_wd = false;
		$("#register_pwd").blur(function(){
			//if(p_hone==true && n_ame == true){ 
				//result = true
			//}else{ 
				//result=false;
			//}
			pwd=$(this).val();
			if(pwd.match(/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]{6,}$/)){ 
				$("#register_error").html('密码可用').css('color','green');
				p_wd = true;
			}else{ 
				$("#register_error").html('密码格式必须是6到18位的数字和字母下划线组成').css('color','red');
				p_wd=false;
			}
			//console.log(p_wd);
			//console.log(result);
		})

		//注册按钮提交时匹配所有规则	
		$(".tabs_form").submit(function(){ 
			//符合所有条件可以提交	
			$('#redister_name').trigger("blur");
			$('#register_phone').trigger("blur");
			$("#register_pwd").trigger("blur");
			$('#register_sms').trigger('blur');
			if(n_ame == true && p_wd == true && p_hone==true && PHONE==true){ 
				return true;
			}else{ 
				return false;
			}
		});
	

</script> 
</html>