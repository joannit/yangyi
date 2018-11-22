@extends('Home.Personal.public')

@section('right')
<html>
 <head></head>
 <body>
  <div class="pull-right">
   <div class="user-content__box clearfix bgf">
    <div class="title">
     {{$data->ordernum}}
    </div>
    <div class="order-info__box">
     <div class="order-addr">
      收货地址：
      <span class="c6">{{$data->aname}}，{{$data->aphone}}　{{$data->address}}</span>
     </div>
     <div class="order-info">
       订单信息
      <table>
       <tbody>


        <tr>
         <td>订单编号：{{$data->ordernum}}</td>
         <td>支付宝交易号：{{$data->alinum}}</td>
         <td>创建时间：{{$data->createtime}}</td>
         <td>创建时间：{{$data->createtime}}</td>
        </tr>
        <tr>


         <td>付款时间：@if($data->paytime){{$data->paytime}}@else未付款@endif</td>
         <td>成交时间：@if($data->c_time){{$data->c_time}}@else订单未完成@endif</td>
         <td>运费：&yen;0.00</td>
        </tr>
       </tbody>
      </table>
     </div>
     <div class="table-thead">
      <div class="tdf3">
       商品
      </div>
      <div class="tdf1">
       品牌
      </div>
      <div class="tdf1">
       数量
      </div>
      <div class="tdf1">
       单价
      </div>
      <div class="tdf2">
       优惠
      </div>
      <div class="tdf1">
       总价
      </div>
      <div class="tdf1">
       折后
      </div>
     </div>

     <div class="order-item__list">




      @foreach($info as $val)
      <div class="item">
       <div class="tdf3">
        <a href="item_show.html">
         <div class="img">
          <img src="/static/home/images/temp/M-003.jpg" alt="" class="cover" />
         </div>
         <div class="ep2 c6">
          {{$val->gname}}
         </div></a>
        <div class="attr ep">
         颜色分类：{{$val->cname}} 尺码：{{$val->value}}
        </div>
       </div>
       <div class="tdf1">
        <span>{{$val->bname}}</span>
        <!-- 已确认收货 -->
       </div>
       <div class="tdf1">
        {{$val->num}}
       </div>
       <div class="tdf1">
        &yen;{{$val->gprice}}
       </div>
       <div class="tdf2">
        <div class="ep2">
         {{($val->discount)/100}}折
         <br />优惠：&yen;{{number_format(($val->gprice)*($val->num)*(1-($val->discount/100)), 2)}}
        </div>
       </div>
       <div class="tdf1">
        &yen;{{number_format(($val->num)*($val->gprice),2)}}
       </div>
       <div class="tdf1">
        <div class="ep2 zhehou">
        &yen;<span>{{number_format(($val->gprice)*($val->num)*($val->discount/100),2)}}</span>
        </div>
       </div>
      </div>
    @endforeach





     </div>
     <div class="price-total">
      <div class="fz12 c9">
       <!-- 使用优惠券【满￥20.0减￥2.0】优惠￥2.0元
       <br />快递运费 ￥0.0 -->
      </div>
      <div class="fz18 c6">
       实付款：
       <b class="cr"></b>
      </div>
     <!--  <div class="fz12 c9">
       （本单可获
       <span class="c6">380</span> 积分）
      </div> -->
     </div>
    </div>
   </div>
  </div>
 </body>
 <script>

      var v=0;

         $('.zhehou').each(function(){
          v+=parseFloat($(this).find('span').html());
        });
        $('.cr').html('￥'+v);

 </script>
</html>

@endsection
@section('title','订单中心')