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
                            <span class="ind-count cr">@if(count($comnum)){{$comnum}}@else 0 @endif</span></a>
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
                            @foreach($hot as $h)
                            <a class="picked-item" href="">
                                <img src="/uploads/goods/{{$h->pic}}" alt="" class="cover">
                                <div class="look_price">¥{{$h->price}}</div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="picked-button-prev"></div>
                <div class="picked-button-next"></div>
            </div>

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
                            if (num <= 1){
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
        <section class="item-show__div item-show__body posr clearfix">
            <div class="item-nav-tabs">
                <ul class="nav-tabs nav-pills clearfix" role="tablist" id="item-tabs">
                    <li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab" aria-controls="detail" aria-expanded="true">商品详情</a></li>
                    <li role="presentation"><a href="#evaluate" role="tab" data-toggle="tab" aria-controls="evaluate">累计评价 <span class="badge"></span></a></li>
                    <li role="presentation"><a href="#service" role="tab" data-toggle="tab" aria-controls="service">售后服务</a></li>
                </ul>
            </div>
            <div class="pull-left">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="detail" aria-labelledby="detail-tab">

                        <div class="rich-text">
                            <!-- 商品详情 -->
                            <center>
                            <p style="text-align: center;">
                               {!!$goods->descr!!}  
                            </p>
                            </center>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="evaluate" aria-labelledby="evaluate-tab">

                        <div class="evaluate-content">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="all" aria-labelledby="all-tab">
                                @if(count($comment)>0)
                                @foreach($comment as $c)
                                    <div class="eval-box">
                                        <div class="eval-author">
                                            <div class="port">
                                                <img src="{{$c->pic}}" alt="" class="cover b-r50">
                                            </div>
                                            <div class="name">{{$c->name}}</div>
                                        </div>
                                        <div class="eval-content">
                                            <div class="eval-text">
                                                评价等级：
                                                @if($c->level==1)
                                                好评
                                                @elseif($c->level ==2)
                                                中评
                                                @else
                                                差评
                                                @endif
                                                <br>
                                                
                                                <br>
                                                {{$c->content}}
                                            </div>
                                            <br>
                                            <div class="eval-text">
                                               <font color="red">商家回复：</font>{!!$c->recontent!!}
                                            </div>
                                            <div class="eval-time">
                                                {{$c->time}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <center>暂无评价</center>
                                    @endif
                                 </div>
                                    <!-- 分页 -->
                                    <div class="page text-center clearfix">
                                       {{$comment->appends($request)->render()}}
                                    </div>
                                </div>
                            </div>
                            <script src="js/jquery.zoom.js"></script>
                        </div>
                    <div role="tabpanel" class="tab-pane fade" id="service" aria-labelledby="service-tab">
                        <!-- 富文本 -->
                        <div class="service-content rich-text">
                            <img title="" alt="" src="http://img.aocmonitor.com.cn/image/2014-06/86575417.gif" width="240" height="160" border="0" align="left"><p>承蒙惠购 AOC 产品，谨致谢意！为了让您更好地使用本产品，武汉艾德蒙科技股份有限公司通过该产品随机附带的保修证向您做出下述维修服务承诺，并按照该服务的承诺向您提供维修服务。</p><p>这些服务承诺仅适用于2016年6月1日（含）之后销售的AOC品牌显示器标准品。</p><p>如果您选择购买了 AOC 显示器扩展功能模块或其它厂家电脑主机，其保修承诺请参见相应产品的保修卡。</p><p>所有承诺内容以产品附件的保修卡为准。</p><p><br></p><h3>一、全国联保</h3><p style="text-indent:2em">AOC 显示器实施全国范围联保，国家标准三包服务。无论您是在中国大陆 ( 不含香港、澳门、台湾地区) 何处购买并在大陆地区使用的显示器，出现三包范围内的故障时，可凭显示器的保修证正本和购机发票到 AOC 显示器维修网点或授权网点进行维修同时，也欢迎您关注官方微信服务号“AOC用户俱乐部”(微信号：aocdisplay)进行查询。</p><div style="text-align:center"><img src="http://img.aocmonitor.com.cn/image/2017-05/89154415.jpg" alt=""></div><p><br></p><p>三包服务如下：</p><ol><li>商品自售出之日起 7 日内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择退货、换货或修理。</li><li>商品自售出之日起 15 日内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择换货或修理。</li><li>商品自售出之日起 1 年内，出现《微型计算机商品性能故障表》中所列故障时，消费者可选择修理。</li></ol><p>以下情况不在三包范围内：</p><ol><li>超过三包有效期。</li><li>无有效的三包凭证及发票。</li><li>发票上内容与商品实物标识不符或者涂改的。</li><li>未按产品使用说明书要求使用、维护、保养而造成损坏的（人为损坏）。</li><li>非 AOC 授权的修理者拆动造成损坏的（私自拆修）。</li><li>非 AOC 在中国大陆（不含香港、澳门、台湾地区）销售的商品。</li></ol><h3>二、显示器专享服务</h3><p><strong>1、LUVIA视界头等舱，VIP专享服务</strong></p><p style="text-indent:2em">AOC针对各省市地区采取指定商品销售，消费者购买指定销往该区域的LUVIA卢瓦尔显示器标准品，从发票开具之日起1年内，注册成为官方微信服务号“AOC用户俱乐部”(微信号：aocdisplay)产品会员，即可在当地享“LUVIA视界头等舱，VIP专享服务”。</p><div style="text-align:center"><img src="http://img.aocmonitor.com.cn/image/2017-05/25352146.jpg" alt=""></div><p><br></p><p style="text-indent:2em">* 如客户未在发票开具之日起1年内注册AOC微信会员，则只享受国家三包服务。</p><p style="text-indent:2em">注册会员方式：1、关注“AOC用户俱乐部”微信公众号。2、点击“会员”→“注册会员”。3、填写个人真实信息并注册产品信息，即可成为AOC产品会员。</p><p style="text-indent:2em"><strong>3年免费上门更换</strong>：从发票开具之日起3年内，产品若发生《微型计算机商品性能故障表》所列性能故障，可免费更换不低于同型号同规格产品。（服务网点无法覆盖区域，全国区域免费邮寄，双向运费由AOC负担）</p><p style="text-indent:2em"><strong>一键快捷掌上服务：</strong>从注册成为“AOC用户俱乐部”会员之日起，可享在线贴身技术顾问有问必答、售后服务在线预约、服务网点在线查询等一键快捷掌上服务。（人工客服咨询在线时间：8:00-22:00）</p><p style="text-indent:2em"><strong>增值豪礼尊享服务：</strong>可参加“AOC用户俱乐部”有奖互动赢取豪礼。</p><p>注：<br>(1)如不能及时提供购机发票或发票记载不清、涂改、商品实物标示和发票内容不符，将以您上传“AOC用户俱乐部”的发票信息为准计算保修时间；如果发票信息并未上传，将以该显示器制造日期(制造日期见显示器后壳条形码标签)加一个月为准计算保修时间。<br>(2)非“AOC用户俱乐部”产品会员，不享受“LUVIA视界头等舱，VIP专享服务”。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="tab-content" id="descCate" style="position: static; top: 800px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="detail-tab" aria-labelledby="detail-tab">
                        <div class="descCate-content bgf5">
                            <dd class="dc-idsItem selected">
                                <a href="#desc-module-1"><i class="iconfont icon-dot"></i> 产品图</a>
                            </dd>
                            <dd class="dc-idsItem">
                                <a href="#desc-module-2"><i class="iconfont icon-selected"></i> 细节图</a>
                            </dd>
                            <dd class="dc-idsItem">
                                <a href="#desc-module-3"><i class="iconfont"></i> 尺寸及试穿</a>
                            </dd>
                            <dd class="dc-idsItem">
                                <a href="#desc-module-4"><i class="iconfont"></i> 模特效果图</a>
                            </dd>
                            <dd class="dc-idsItem">
                                <a href="#desc-module-5"><i class="iconfont"></i> 常见问题</a>
                            </dd>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="service-tab" aria-labelledby="service-tab">

                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('#descCate').smartFloat(0);
                    $('.dc-idsItem').click(function() {
                        $(this).addClass('selected').siblings().removeClass('selected');
                    });
                    $('#item-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                        $('#descCate #' + $(e.target).attr('aria-controls') + '-tab')
                        .addClass('in').addClass('active').siblings()
                        .removeClass('in').removeClass('active');
                    });
                });
            </script>
        </section>
    </div>
@endsection
@section('title','商品详情')
