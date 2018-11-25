@extends('Home.Personal.public')
@section('right')
<div class="pull-right"> 
   <div class="user-center__info bgf"> 
    <div class="pull-left clearfix"> 
     <div class="port b-r50 pull-left"> 
      <img src="@if($user_info) {{$user_info->pic}} @else /static/home/images/icons/default_avt.png  @endif" alt="用户名" class="cover b-r50" /> 
      <a href="/personal/{{session('user')['id']}}/edit" class="edit"><i class="iconfont icon-edit"></i></a> 
     </div> 
     @if(count($user_info)>0)
     <p class="name text-nowrap">您好，{{$user_info->name}}！</p> 
      <p class="level text-nowrap">身份：@if($user_info->user_level == 1) 会员用户 @else 普通用户 @endif
    @else
       <p class="name text-nowrap">未设置昵称</p>
       <p class="level text-nowrap">身份： 普通用户 
    @endif
    </div> 
    <div class="pull-right user-nav"> 
     <a href="/myorder" class="user-nav__but"> <i class="iconfont icon-rmb fz40 cr"></i> 
      <div class="c6">
       待支付 
       <span class="cr">@if(count($notpay)) {{$notpay}} @endif</span>
      </div> </a> 
     <a href="/myorder" class="user-nav__but"> <i class="iconfont icon-eval fz40 cr"></i> 
      <div class="c6">
       待评价 
       <span class="c3">@if(count($cnum)) {{$cnum}} @endif</span>
      </div> </a> 
     <a href="" class="user-nav__but"> <i class="iconfont icon-star fz40 cr"></i> 
      <div class="c6">
       收藏 
       <span class="c3">0</span>
      </div> </a> 
     <a href="" class="user-nav__but"> <i class="iconfont icon-quan fz40 cr"></i> 
      <div class="c6">
       优惠券 
       <span class="cr">2</span>
      </div> </a> 
     <a href="" class="user-nav__but"> <i class="iconfont icon-jifen fz40 cr"></i> 
      <div class="c6">
       积分 
       <span class="cr">200</span>
      </div> </a> 
     <a href="@if(count($msg)>0) /message @endif" class="user-nav__but"> <i class="iconfont icon-xiaoxi fz40 cr"></i> 
      <div class="c6">
       消息 
       <span class="cr">{{count($msg)}}</span>
      </div> </a> 
    </div> 
   </div> 


@endsection
@section('title','个人中心')