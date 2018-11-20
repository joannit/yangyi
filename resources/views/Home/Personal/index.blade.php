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
     <a href="udai_order.html" class="user-nav__but"> <i class="iconfont icon-rmb fz40 cr"></i> 
      <div class="c6">
       待支付 
       <span class="cr">1</span>
      </div> </a> 
     <a href="udai_order.html" class="user-nav__but"> <i class="iconfont icon-eval fz40 cr"></i> 
      <div class="c6">
       待评价 
       <span class="c3">0</span>
      </div> </a> 
     <a href="udai_collection.html" class="user-nav__but"> <i class="iconfont icon-star fz40 cr"></i> 
      <div class="c6">
       收藏 
       <span class="c3">0</span>
      </div> </a> 
     <a href="udai_coupon.html" class="user-nav__but"> <i class="iconfont icon-quan fz40 cr"></i> 
      <div class="c6">
       优惠券 
       <span class="cr">2</span>
      </div> </a> 
     <a href="udai_integral.html" class="user-nav__but"> <i class="iconfont icon-jifen fz40 cr"></i> 
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
   <div class="order-list__div bgf"> 
    <div class="user-title">
      我的订单
     <span class="c6">（显示最新三条）</span> 
     <a href="" class="pull-right">查看所有订单&gt;</a> 
    </div> 
    <div class="order-panel"> 
     <ul class="nav user-nav__title" role="tablist"> 
      <li role="presentation" class="nav-item active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">所有订单</a></li> 
      <li role="presentation" class="nav-item "><a href="#pay" aria-controls="pay" role="tab" data-toggle="tab">待付款 <span class="cr">0</span></a></li> 
      <li role="presentation" class="nav-item "><a href="#emit" aria-controls="emit" role="tab" data-toggle="tab">待发货 <span class="cr">0</span></a></li> 
      <li role="presentation" class="nav-item "><a href="#take" aria-controls="take" role="tab" data-toggle="tab">待收货 <span class="cr">0</span></a></li> 
      <li role="presentation" class="nav-item "><a href="#eval" aria-controls="eval" role="tab" data-toggle="tab">待评价 <span class="cr">0</span></a></li> 
     </ul> 
     <div class="tab-content"> 
      <div role="tabpanel" class="tab-pane fade in active" id="all"> 
       <table class="table text-center"> 
        <tbody>
         <tr> 
          <th width="380">商品信息</th> 
          <th width="85">单价</th> 
          <th width="85">数量</th> 
          <th width="120">实付款</th> 
          <th width="120">交易状态</th> 
          <th width="120">交易操作</th> 
         </tr> 
         <tr class="order-item"> 
          <td> <label> 
            <div class="num"> 
             <!-- <input type="checkbox"> --> 2017-03-30 订单号: 2669901385864042 
            </div> 
            <div class="card"> 
             <div class="img">
              <img src="images/temp/item-img_1.jpg" alt="" class="cover" />
             </div> 
             <div class="name ep2">
              纯色圆领短袖T恤活动衫弹力柔软纯色圆领短袖T恤
             </div> 
             <div class="format">
              颜色分类：深棕色 尺码：均码
             </div> 
             <div class="favour">
              使用优惠券：优惠&yen;2.00
             </div> 
            </div> </label> </td> 
          <td>$100</td> 
          <td>1</td> 
          <td>$1000<br /><span class="fz12 c6 text-nowrap">(含运费: &yen;0.00)</span></td> 
          <td class="state"> <a class="but c6">等待付款</a> <a href="" class="but c9">订单详情</a> </td> 
          <td class="order"> <a href="udai_shopcart_pay.html" class="but but-primary">立即付款</a> 
           <!-- <a href="" class="but but-link">评价</a> --> <a href="" class="but c3">取消订单</a> </td> 
         </tr>  
        </tbody>
       </table> 
      </div> 
     </div> 
    </div> 
   </div> 

@endsection
@section('title','个人中心')