<?php
	//function fun(){ 

		//echo '只是自定义函数';
	//}
	//发送短信校验码
function sendphone($phone){
//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='19a254ecd686d63ae2d025ae75c805ea';
//填写在开发者控制台首页上的Auth Token
$options['token']='fcf91281bc97a66cddfa65c8a9ce227f';

//初始化 $options必填
$ucpass = new Ucpaas($options);
// var_dump($ucpass);
$appid = "44ca53f38a8e45138de090c37b81916f";	//应用的ID，可在开发者控制台内的短信产品下查看
$templateid = "387605";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
$param =rand(1,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
\Cookie::queue('param',$param,1);
$mobile =$phone;
$uid = "";
//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
echo  $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
	}
?>