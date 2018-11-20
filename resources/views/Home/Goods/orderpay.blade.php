@extends('Home.Goods.public')

@section('body')
<head>
    <style>
        td{
            text-align:center; /*设置水平居中*/
            vertical-align:middle;/*设置垂直居中*/
        }
    </style>
</head>
 <div class="top-search">
        <div class="inner">
            <a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>


<div class="search-box">
    <h2>购物车</h2>
    <!-- form class="input-group" action="/home/type" method="get">
        <input placeholder="Ta们都在搜U袋网" type="text" name="keywords">
        <span class="input-group-btn">
            <button type="submit">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
        </span>
    </form> -->
</div>
     </div>
    </div>


    <div class="content clearfix bgf5">
        <section class="user-center inner clearfix">
            <div class="user-content__box clearfix bgf">
                <div class="title">购物车-确认支付 </div>
                <div class="shop-title">收货地址</div>
                <!-- 表单 -->
                <form action="/pay" class="shopcart-form__box" method="post">
                    <div class="addr-radio">



                        @if (count($address))
                        @foreach($address as $val)
                        <div class="addressdefalut radio-line radio-box @if($val->default==1) active @endif">
                            <label class="radio-label ep" title="{{$val->address}}
                                （{{$val->aname}} 收） {{$val->aphone}}">
                                <input name="address" @if($val->default==1) checked @endif value="{{$val->id}}" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>{{$val->address}}
                                （{{$val->aname}} 收） {{$val->aphone}}

                            </label>
                            <input type="hidden" name="default" value="{{$val->default}}">
                            <a href="javascript:;" class="adefault" >默认地址</a>
                            <a href="udai_address_edit.html" class="edit">修改</a>
                        </div>
                        @endforeach

                        @else
                        <div class=" active">
                            <center><h2 style="color:red;">您还未添加收货地址</h2></center>
                             </div>
                        @endif

                    </div>
                    <div class="add_addr"><a href="udai_address.html">添加新地址</a></div>
                    <div class="shop-title">确认订单</div>
                    <div class="shop-order__detail">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="150" height="100px">图片</th>
                                    <th width="120" >商品信息</th>
                                    <th width="120">单价</th>
                                    <th width="120">数量</th>
                                    <th width="120">每件优惠</th>
                                    <th width="120">运费</th>
                                    <th width="120">总价</th>
                                    <th width="120">实际付款</th>


                                </tr>
                            </thead>
                            <tbody>

                            <!-- 订单 -->
                                <tr>
                                    <th scope="row"><a href="item_show.html"><div class="img"><img src="/uploads/goods/{{$goodsinfo->pic}}" alt="/uploads/goods/{{$goodsinfo->pic}}" class="cover" style="width:100%;height:100%"></div></a></th>
                                    <td >
                                        <div class="name ep3" style="height:1.5em">{{$goodsinfo->name}}</div>
                                        <div class="type c9">颜色：{{$goodsinfo->colorid}} <br>
                                        尺码：{{$goodsinfo->sizeid }}</div>
                                    </td>
                                    <td >{{$goodsinfo->gprice}}</td>
                                    <td >{{$goodsinfo->num}}</td>
                                    <td >{{$goodsinfo->discount/100}}折</td>
                                    <td >0.0</td>
                                    <td >¥{{($goodsinfo->gprice)*($goodsinfo->num)}}</td>
                                    <td >¥{{($goodsinfo->gprice)*($goodsinfo->discount/100)*($goodsinfo->num)}}</td>
                                </tr>
                                <!-- end订单 -->

                            </tbody>
                        </table>
                    </div>
                    <div class="shop-cart__info clearfix">
                        <div class="pull-left text-left">
                            <div class="info-line text-nowrap">购买时间：<span class="c6">{{$goodsinfo->createtime}} </span></div>
                            <div class="info-line text-nowrap">交易类型：<span class="c6">py交易</span></div>
                            <div class="info-line text-nowrap">交易号：<span class="c6">{{$goodsinfo->ordernum}}</span></div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="form-group">
                                <label for="coupon" class="control-label">优惠券使用：</label>
                                <select id="coupon" >
                                    <option value="-1" selected>- 请选择可使用的优惠券 -</option>
                                    <option value="1">【满￥20.0元减￥2.0】</option>
                                    <option value="2">【满￥30.0元减￥2.0】</option>
                                    <option value="3">【满￥25.0元减￥1.0】</option>
                                    <option value="4">【满￥10.0元减￥1.5】</option>
                                    <option value="5">【满￥15.0元减￥1.5】</option>
                                    <option value="6">【满￥20.0元减￥1.0】</option>
                                </select>
                            </div>
                            <script>
                                $('#coupon').bind('change',function() {
                                    console.log($(this).val());
                                })
                            </script>
                            <div class="info-line">优惠活动：<span class="c6">无</span></div>
                            <div class="info-line">运费：<span class="c6">¥0.00</span></div>
                            <div class="info-line"><span class="favour-value">已优惠 ¥2.0</span>合计：<b class="fz18 cr">¥18.0</b></div>
                            <div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
                        </div>
                    </div>
                    <div class="shop-title">确认订单</div>
                    <!-- 支付方式 -->
                    <div class="pay-mode__box">
                        <!-- <div class="radio-line radio-box">
                            <label class="radio-label ep">
                                <input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
                                <span class="fz16">余额支付</span><span class="fz14">（可用余额：¥88.0）</span>
                            </label>
                            <div class="pay-value">支付<b class="fz16 cr">18.00</b>元</div>
                        </div> -->
                        <div class="radio-line radio-box">
                            <label class="radio-label ep">
                                <input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
                                <img src="/static/home/images/icons/alipay.png" alt="支付宝支付">
                            </label>
                            <div class="pay-value">支付<b class="fz16 cr">18.00</b>元</div>
                        </div>
                        <!-- <div class="radio-line radio-box">
                            <label class="radio-label ep">
                                <input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
                                <img src="/static/home/images/icons/paywechat.png" alt="微信支付">
                            </label>
                            <div class="pay-value">支付<b class="fz16 cr">18.00</b>元</div>
                        </div> -->
                    </div>
                    {{csrf_field()}}
                    <div class="user-form-group shopcart-submit">
                        <button type="submit" class="btn">继续支付</button>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $(this).on('change','input',function() {
                                $(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
                            })
                        });
                    </script>
                </form>
            </div>
        </section>
    </div>


    <!-- 右侧菜单 -->
    <div class="right-nav">
        <ul class="r-with-gotop">
            <li class="r-toolbar-item">
                <a href="udai_welcome.html" class="r-item-hd">
                    <i class="iconfont icon-user" data-badge="0"></i>
                    <div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="udai_shopcart.html" class="r-item-hd">
                    <i class="iconfont icon-cart"></i>
                    <div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="udai_collection.html" class="r-item-hd">
                    <i class="iconfont icon-aixin"></i>
                    <div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="" class="r-item-hd">
                    <i class="iconfont icon-liaotian"></i>
                    <div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="issues.html" class="r-item-hd">
                    <i class="iconfont icon-liuyan"></i>
                    <div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
                </a>
            </li>
            <li class="r-toolbar-item to-top">
                <i class="iconfont icon-top"></i>
                <div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
            </li>
        </ul>
        <script>
            $(document).ready(function(){ $('.to-top').toTop({position:false}) });
        </script>
    </div>

        <script>

            $('.adefault').click(function(){
                // alert(111);
                id=$(this).parent().find('.radio-label input:first').val();
                // val1 = $(this).parent().find('input:last').val();
              $.get('/defaultadd',{id:id,adefault:val1},function(data){

                alert(data);
              });

});
        </script>




@endsection