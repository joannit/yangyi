@extends('Home.Goods.public')
@section('title','商品详情')
@section('body')
 <div class="top-search">
        <div class="inner">
            <a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>


<div class="search-box">
    <form class="input-group" action="/home/type" method="get">
        <input placeholder="Ta们都在搜U袋网" type="text" name="keywords">
        <span class="input-group-btn">
            <button type="submit">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
        </span>
    </form>
</div>
     </div>
    </div>


    <div class="content inner">

        <section class="item-show__div item-show__head clearfix">
            <div class="pull-left">
                <ol class="breadcrumb">
                    <!-- 路径导航 -->
                    <li style="font-size:1.5em"><a href="/" >首页</a></li>
                    @foreach($type as $val)
                    <li style="font-size:1.2em">{{$val}}</li>
                    @endforeach
                    <li class="active">{{$goods->name}}</li>
                </ol>
                <div class="item-pic__box" id="magnifier">
                    <div class="small-box">
                        <img class="cover" src="/static/home/images/temp/S-001-1_s.jpg" alt="{{$goods->name}}">
                        <span class="hover"></span>
                    </div>
                    <div class="thumbnail-box">
                        <a href="javascript:;" class="btn btn-default btn-prev"></a>
                        <div class="thumb-list">
                            <ul class="wrapper clearfix">
                                <li class="item active" data-src="/static/home/images/temp/S-001-1_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-1_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-2_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-2_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-3_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-3_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-4_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-4_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-5_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-5_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-6_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-6_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-7_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-7_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-8_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-8_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-9_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-9_s.jpg" alt="商品预览图"></li>
                                <li class="item" data-src="/static/home/images/temp/S-001-10_b.jpg"><img class="cover" src="/static/home/images/temp/S-001-10_s.jpg" alt="商品预览图"></li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-default btn-next"></a>
                    </div>
                    <div class="big-box"><img src="/static/home/images/temp/S-001-1_b.jpg" alt="重回汉唐 旧忆 原创设计日常汉服女款绣花长褙子吊带改良宋裤春夏"></div>
                </div>
                <script src="/static/home/js/jquery.magnifier.js"></script>
                <script>
                    $(function () {
                        $('#magnifier').magnifier();
                    });
                </script>
                <div class="item-info__box">
                    <div class="item-title">
                        <div class="name ep2">{{$goods->name}}</div>

                        <div class="sale cr discount">优惠活动：该商品享受8折优惠<span  id="shoucangss" class="btn btn-warning" style="margin-left:310px;background-color:;">收藏该商品</span></div>


                    </div>
                    <div class="item-price bgf5">
                        <div class="price-box clearfix">
                            <div class="price-panel pull-left">
                                售价：<span class="price">￥<span class="disprice">19.20</span> <s class="fz16 c9">￥<s class="gprice">24.00</s></s></span>
                            </div>
                            <div class="vip-price-panel pull-right">
                                会员等级价格 <i class="iconfont icon-down"></i>
                                <ul class="all-price__box" style="visibility:hidden">
                                    <!-- 登陆后可见 -->

                                    <li><span class="text-justify ptyh">普通：</span>40.00元</li>

                                    <li><span class="text-justify vipyh">V I P：</span>19.20元</li>
                                </ul>
                            </div>
                            <script>
                            	
                                // 会员价格折叠展开
                                $(function () {
                                    $('.vip-price-panel').click(function() {
                                        if ($(this).hasClass('active')) {
                                            $('.all-price__box').stop().slideUp('normal',function() {
                                                $('.vip-price-panel').removeClass('active').find('.iconfont').removeClass('icon-up').addClass('icon-down');
                                            });
                                        } else {
                                            $(this).addClass('active').find('.iconfont').removeClass('icon-down').addClass('icon-up');
                                            $('.all-price__box').stop().slideDown('normal');
                                        }
                                    });
                                });
                            </script>
                        </div>
                      <!--   <div class="c6">普通会员限购 2 件，想要<u class="cr"><a href="">购买更多</a></u>？</div> -->
                    </div>
                    <ul class="item-ind-panel clearfix">
                        <li class="item-ind-item">
                            <span class="ind-label c9">累计销量</span>
                            <span class="ind-count cr">{{$goods->sales}}</span>
                        </li>
                        <li class="item-ind-item">
                            <a href=""><span class="ind-label c9">累计评论</span>
                            <span class="ind-count cr">{{$comnum}}</span></a>
                        </li>
                        <li class="item-ind-item">
                            <span class="ind-label c9">赠送积分</span>
                            <span class="ind-count cg">你丑，不赠送</span>
                        </li>
                    </ul>
                    <div class="item-key">
                        <div class="item-sku">
                            <dl class="item-prop clearfix">
                                <dt class="item-metatit">商品规格</dt>
                                <dd><ul data-property="颜色" class="clearfix">

                            <!-- 商品规格 -->
                                @foreach($goodsinfo as $val)
                                    <li class="goodscolor"><a href="javascript:;" role="button" data-value="黑色" aria-disabled="true" class="goodson" >
                                    <input type="hidden" name="id" value="{{$val->id}}">
                                        <span >{{$val->colorid}}{{$val->sizeid}}</span>
                                    </a></li>
                                @endforeach

                                </ul></dd>
                            </dl>

                        </div>
                        <form action="/home/goodsinfo" method="post" class="buynow" onsubmit id="runnext">
                        <input type="hidden" name="ginfoid" value="">
                        <div class="item-amount clearfix bgf5">
                            <div class="item-metatit">数量：</div>
                            <div class="amount-box">
                                <div class="amount-widget">
                                    <input class="amount-input" name="num" value="1" maxlength="8" title="请输入购买量" type="text">
                                    <div class="amount-btn">
                                        <a class="amount-but add"></a>
                                        <a class="amount-but sub"></a>
                                    </div>
                                </div>
                                <div class="item-stock"><span style="margin-left: 10px;">库存 <b id="Stock"></b>件</span></div>
                                <script>

                                </script>
                            </div>
                        </div>
                        <div class="item-action clearfix bgf5">

                             <div><input type="hidden" name="gid" value="{{$goodsinfo[0]->gid}}"></div>>
                            <button ata-addfastbuy="true" title="点击此按钮，到下一步确认购买信息。" role="button" class="item-action__buy">立即购买</button>
                            {{csrf_field()}}
                        </form>

                            <a href="javascript:;" rel="nofollow" id="addcart" data-addfastbuy="true" role="button" class="item-action__basket">
                                <i class="iconfont icon-shopcart"></i>加入购物车
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pull-right picked-div">
                <div class="lace-title">
                    <span class="c6">爆款推荐</span>
                </div>
                <div class="swiper-container picked-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-6_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-7_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-8_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-9_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-10_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                            <a class="picked-item" href="">
                                <img src="/static/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
                                <div class="look_price">¥134.99</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="picked-button-prev"></div>
                <div class="picked-button-next"></div>
                <script>
                	
                    $(document).ready(function(){
                        // 顶部banner轮播
                        var picked_swiper = new Swiper('.picked-swiper', {
                            loop : true,
                            direction: 'vertical',
                            prevButton:'.picked-button-prev',
                            nextButton:'.picked-button-next',
                        });
                    });


                    // 库存
                    var goodsstore;
                    // 判断是否选择规格
                    var store;
                $('.goodscolor').click(function(){
                    // $(this).parent().children('li').removeClass('on');
                    store=1;
                    $('.goodson').removeClass('on');

                    $(this).find('a:first').addClass('on');
                    // 点击规格获取详情id
                    var infoid=$(this).find('input:first').val();

                    $.get('/ajaxginfo',{id:infoid},function(data){

                       // alert(data.store);
                    goodsstore=data.store;
                       $('#Stock').html(data.store);
                       $('.gprice').html(data.gprice);
                       // 优惠后价格
                       gprice=data.gprice*( data.discount /100);
                       // alert();
                       // 取两位小数
                       $('.disprice').html(gprice.toFixed(2));
                       $('.all-price__box').css('visibility','visable');
                      $('input[name=ginfoid]').val(data.id);

                    });

                });

            // 库存
                var stock = parseInt($('#Stock').html());
                $(function () {
                    $('.amount-input').onlyReg({reg: /[^0-9]/g});

                    $('.amount-widget').on('click','.amount-but',function() {

                        if(store!=1){
                            alert('请先选择规格')
                        } else {
                        var  num = parseInt($('.amount-input').val());
                        if (!num) num = 0;
                        if ($(this).hasClass('add')) {
                            if (num > goodsstore-1){

                                return DJMask.open({
                                　　width:"300px",
                                　　height:"100px",
                                　　content:"您输入的数量超过库存上限"
                            　　});
                            } else {
                                $('.amount-input').val(num + 1);
                            }
                        //减法
                        } else if ($(this).hasClass('sub')) {
                            if (num == 1){
                                return DJMask.open({
                                　　width:"300px",
                                　　height:"100px",
                                　　content:"您输入的数量有误"
                            　　});
                            }
                            else {
                                $('.amount-input').val(num - 1);
                            }

                           if (num > goodsstore-1){
                                return DJMask.open({
                                　　width:"300px",
                                　　height:"100px",
                                　　content:"您输入的数量超过库存上限"
                            　　});
                            }
                        }
                        // 当鼠标离开库存输入框后


                    }
                    });


                });

                    $('.buynow').submit(function(){
                        var value=$('.amount-input').val();
                        // 判断是否选择规格
                        if(store==1)
                        {
                            if(value) {
                                if(value>goodsstore) {
                                    // 判断数量是否超过库存
                                    alert('购买数量不能大于库存');
                                    return false;
                                } else {
                                    // alert(value);
                                    return true;
                                }
                            // return false;
                            // 满足购买条件
                            }else {
                                alert('请选择购买数量');
                                return false;
                            }

                        } else {
                            alert('请先选择规格');
                            return false;
                        }
                    });


                $(function(){
                    $("#addcart").click(function(){
                        var newUrl = '/addcart';    //设置新提交地址
                        $("#runnext").attr('action',newUrl);
                           //通过jquery为action属性赋值

                        $("#runnext").submit();    //提交ID为myform的表单
                    })
                })

                //判断进入页面收藏是否
                $(function(){ 
					vv=$('.goodscolor').find('input:first').val();
					$.get('/shoucang',{id:vv},function(data){ 
                			//alert(data);
                			if(data==1){ 
                				$('#shoucangss').html('取消收藏');
                			}else{ 
                				$('#shoucangss').html('收藏该商品');
                			}
                		});
                });

                //获取当前信息id
                $('#shoucangss').click(function(){ 
                	vv=$('.goodscolor').find('input:first').val();
                	$.get('/shoucangs',{id:vv},function(data){ 
                		//alert(data);
                		if(data==1){ 
                			$('#shoucangss').html('收藏该商品');	
                		}else if(data==2){ 
							$('#shoucangss').html('取消收藏');
                		}else{ 
                			alert('请先登录在再收藏');
                			$('#shoucangss').html('收藏该商品');
                		}
                	})
                });
                </script>
            </div>
        </section>
    </div>
@endsection
