@extends("Home.public")
@section("main")
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
	<link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	 <script src="/static/home/js/jquery.1.12.4.min.js" charset="UTF-8"></script> 
	<style>
	.link_content{ 
    border: 1px solid #ddd;
    overflow: hidden;
    zoom: 1;}

	</style>
</head>
<body>

				@if(session('success'))
      			<div class="alert alert-danger" id="box">
                <button class="close" data-dismiss="alert"></button>
                <strong>{{session('success')}}</strong>
        	    </div>
  				@endif

			<div class="link_content" style="background-color:#ccc">
				<h3 class="link_tit">友情链接</h3>
				<ul class="link_list" style="float:left;">
				@foreach($data as $row)
						<span style="font-size:1.3em;margin-left:15px;font-color:#ccc"><a href="{{$row->url}}" target="_blank">{{$row->linkname}}</a></span>	
				@endforeach()	
				</ul>
				<div class="Pagination">		
				</div>
			</div>

			<center>
			<div class="link_content">
				<h3 class="link_tit">申请友情链接</h3>
				<ul class="link_step">
					<li class="link_step_tit">申请步骤：</li>
					<li>
						<div class="float_Left">
							1.</div>
						<div class="margin_l_12">
							请先在贵网站做好羊燚的文字友情链接：
							<br> 链接文字：羊燚链接地址：
							<a href="//www.yangyi.com" target="_blank">www.yangyi.com</a></div>
					</li>
					<li>2.做好链接后，请在右侧填写申请信息。羊燚只接受申请文字友情链接。</li>
					<li>
						<div class="float_Left"> 3.</div>
						<div class="margin_l_12">
							已经开通我站友情链接且内容健康，符合本站友情链接要求的网站，经羊燚管理员审核后，可以显示在此友情链接页面。</div>
					</li>
					<li>
						<div class="float_Left"> 4.</div>
						<div class="margin_l_12">
							请通过右侧提交申请，注明：友情链接申请。</div>
					</li>
				</ul>
				<form id="frm_submit" action="/link" method="post">
				<table cellpadding="0" cellspacing="0" class="link_table" width="350">
					<tbody><tr>
						<td height="29" colspan="2" valign="top" class="link_step_tit">
							申请信息</td>
					</tr>
					<tr>
						<td height="29">
							网站名称：
						</td>
						<td height="29">
							<input id="name" name="linkname" type="text" class="w247" style="height:30px" required>
						</td>
					</tr>
					<tr>
						<td height="29">
							网&nbsp;&nbsp;&nbsp;&nbsp;址：
						</td>
						<td height="29">
							<input id="url" name="url" type="text" class="w247" value="http://" style="height:30px"><span></span>
						</td>
					</tr>
					<tr>
						<td height="35">
							电子邮箱：
						</td>
						<td height="29">
							<input id="email" name="email" type="text" class="w247" style="height:30px"><span></span>
						</td>
					</tr>
					<tr>
						<td width="61" height="29" valign="top">
							网站介绍：
						</td>
						<td width="348" valign="top">
							<textarea id="intro" name="descr" cols="" rows="" class="w247h60" required></textarea>
						</td>
					</tr>
					<tr>
					{{csrf_field()}}
						<td height="45" colspan="2" align="center" valign="middle">
							<button type="submit" class="btn btn-info">提交申请</button>
						</td>
					</tr>
				</tbody></table>
				</form>
			</div>
			</center>
</body>
<script>
	flag=false;
	$("#url").blur(function(){ 
		//alert(1);
		url=$(this).val();
		//alert(url);
		if(url.match(/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/)){
			$(this).next().html('网址可用').css('color','green');
		
			flag=true;
		}else{ 
			$(this).next().html('网址不合法').css('color','red');
			flag=false;
		}
	})
	flag1=false;
	$("#email").blur(function(){ 
		//alert(1);
		email=$(this).val();
		//alert(url);
		if(email.match(/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/)){
			$(this).next().html('邮箱可用').css('color','green');
			flag1=true;
		}else{ 
			$(this).next().html('邮箱不合法').css('color','red');
			flag1=false;
		}
	})
	$("#frm_submit").submit(function(){ 

		if(flag==true && flag1==true){ 

			return true;
		}else{ 

			return false;
		}
	});

	$('#box').click(function(){ 

		$(this).hide();
	});
</script>
</html>
@endsection()
@section('title','友情链接')