@extends('Home.Personal.public')

@section('right')
    <html>
 <head>

     <style>

        .pagination li {width:40px; float: left;margin-left:3px;font-size: 2em}

     </style>
 </head>
 <body>
  <div class="pull-right">
   <div class="user-content__box clearfix bgf">
    <div class="title">
     订单中心-我的订单
    </div>
    <div class="order-list__box bgf">
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
           <th width="85">总价</th>
           <th width="85">数量</th>
           <th width="120">实付款</th>
           <th width="120">交易状态</th>
           <th width="120">交易操作</th>
          </tr>

        @if (count($data))
        @foreach($data as $val)
          <tr class="order-item">
           <td> <label> <a href="udai_order_detail.html" class="num"> {{$val->createtime}} 订单号: {{$val->ordernum}} </a>
             <div class="card">

              <div class="img">
               <img src="/uploads/goods/{{$val->info->pic}}" alt="" class="cover" />
              </div>
              <div class="name ep2">
              {{$val->info->name}}
              </div>
              <div class="format">
               颜色分类：{{$val->info->cname}} 尺码：{{$val->info->value}}
              </div>
              <div class="favour">
               普通折扣{{($val->info->discount)/100}}折：优惠&yen;{{($val->tprice)-($val->pay)}}
              </div>

             </div> </label> </td>
           <td>￥{{$val->tprice}}</td>
           <td>{{$val->num}}</td>
           <td>￥{{$val->pay}}<br /><span class="fz12 c6 text-nowrap">(含运费: &yen;0.00)</span></td>
           <td class="state"> <a class="but c6">
            <!-- 状态 -->
           @if($val->ostatus==1)
            待付款
           @elseif($val->ostatus==2)
            待发货
           @elseif($val->ostatus==3)
           待收货
           @elseif($val->ostatus==4)
           已确认收货
           @elseif($val->ostatus==5)
           待评价
           @elseif($val->ostatus==6)
            订单已完成
           @endif






           </a> <a href="/myorder/{{$val->id}}" class="but c9">订单详情</a> </td>
           <td class="order">
           <!-- 删除 -->
            <div class="del">
             @if($val->ostatus >=4)
             <form action="/myorder/{{$val->id}}" method="post">
             {{csrf_field()}}
             {{method_field('DELETE')}}
             <button class="glyphicon glyphicon-trash" aria-hidden="true">
             </button></form>
             @endif
             </div>
             <!-- 操作 -->
             @if($val->ostatus==1)
             <a href="/paynow/{{$val->id}}" class="but but-primary">立即付款</a>
            @elseif($val->ostatus==2)
           <span class="but but-#ccc" style="width:200px">商家正在处理订单</span>
            @elseif($val->ostatus==3)
             <a href="/changestatus/{{$val->id}}" class="but but-primary changestatus">确认收货</a>
            @elseif($val->ostatus==4)
            <a href="/myorder/{{$val->id}}" class="but but-primary">交易完成</a>
            <a href="/myorder/{{$val->id}}" class="but ">立即评价</a>
            @endif
            @if($val->ostatus < 2)
             <form action="/myorder/{{$val->id}}" method="post">
             {{csrf_field()}}
             {{method_field('DELETE')}}
             <input class="but c3"  type="submit" value="取消订单">
             </form>
            <!-- <a href="" class="but c3">取消订单</a> -->
            @endif
            </td>

          </tr>
          @endforeach
        @else
        <tr class="order-item">
        <td colspan="6"><center><h2 style="color:red">暂无订单</h2></center></td>
        </tr>
        @endif


         </tbody>
        </table>

        <div class="" colspan="6">{{$data->appends($request)->render()}}</div>






       </div>


      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
 <script>
            // $('changestatus').cick
</script>
</html>

@endsection