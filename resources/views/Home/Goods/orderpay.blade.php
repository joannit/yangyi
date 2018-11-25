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
                    <h2>确认订单</h2>
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
        @if(session('error'))
          <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <strong>{{session('error')}}</strong>
        </div>
        @endif




    <div class="content clearfix bgf5">
        <section class="user-center inner clearfix">
            <div class="user-content__box clearfix bgf">
                <div class="title">购物车-确认支付</div>
                <div class="shop-title">收货地址</div>
                <!-- 表单 -->
                <form action="/pay" class="shopcart-form__box" method="post" >
                    <div class="addr-radio">




                        @if (count($address))
                        @foreach($address as $val)
                        <div class="addressdefalut radio-line radio-box @if($val->default==1) active @endif">
                            <label class="radio-label ep" title="{{$val->address}}
                                （{{$val->aname}} 收） {{$val->aphone}}">
                                <input name="address" @if($val->default==1) checked @endif value="{{$val->id}}" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>{{$val->address}}
                                （{{$val->aname}} 收） {{$val->aphone}}

                            </label>
                            <!-- 用于ajax操作 -->
                            <input type="hidden" name="default" value="{{$val->default}}">
                             @if($val->default==1) <a href="javascript:;" class="notadefault">默认地址</a>
                             @else <a href="javascript:;" class="adefault" >设置为默认地址</a>

                            @endif
                            <a href="/paddress/editadd/{{$val->id}}" class="edit">修改</a>
                        </div>
                        @endforeach

                        @else
                        <div class=" active">
                            <center><h2 style="color:red;">您还未添加收货地址</h2></center>
                             </div>
                        @endif


                    </div>
                    <div class="add_addr"><a href="/paddress">添加新地址</a></div>
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
                                    <!-- <th width="120">运费</th> -->
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
                                    <td >{{$goodsinfo->discount/10}}折</td>
                                    <!-- <td >0.0</td> -->
                                    <td >¥{{($goodsinfo->gprice)*($goodsinfo->num)}}</td>
                                    <td id="zongjia">¥{{($goodsinfo->gprice)*($goodsinfo->discount/100)*($goodsinfo->num)}}</td>
                                </tr>






                                <!-- end订单 -->

                            </tbody>
                        </table>
                    </div>
                    <div class="shop-cart__info clearfix">
                        <div class="pull-left text-left">
                            <div class="info-line text-nowrap">购买时间：<span class="c6">{{$ordertime}} </span></div>
                            <div class="info-line text-nowrap">交易类型：<span class="c6">py交易</span></div>
                            <div class="info-line text-nowrap">交易号：<span class="c6">{{$orderid}}</span></div>
                        </div>
                        <div class="pull-right text-right">
                            <div class="form-group">
                                <label for="coupon" class="control-label">优惠券使用：</label>

                                <select id="coupon" name="crid">
                                    <option value="-1" selected disabled>- 请选择可使用的优惠券 -</option>
                                    @foreach($data as $rows)
                                    <option value="{{$rows->crid}}" id="optis">【{{$rows->pname}}】</option>
                                    @endforeach()
                                </select>
                            </div>
                            <script>
                                $('#coupon').bind('change',function() {
                                    console.log($(this).val());
                                })
                            </script>
                            <div class="info-line">优惠活动：<span class="c6 youhui"></span></div>
                            <div class="info-line">运费：<span class="c6">¥0.00</span></div>

                            <div class="info-line"><span class="favour-value">已优惠 ¥0.0</span>合计：<b class="fz18 cr" id="jiner">¥{{($goodsinfo->gprice)*($goodsinfo->discount/100)*($goodsinfo->num)}}</b></div>

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
                             <!--    <input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i> -->
                                <img src="/static/home/images/icons/alipay.png" alt="支付宝支付"><span style="margin-left:700px;font-size:1.5em;color:red;font-weight:bold">目前仅支持支付宝支付</span>
                            </label>

                            <div class="pay-value">支付<b class="fz16 cr ">18.00</b>元</div>

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
                   // alert(1);
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
        //alert(1);
            node=$('.notadefault');
            de= $('.adefault');
            $('.adefault').click(function(){
                // alert(111);
                de=$(this)
                id=$(this).parent().find('.radio-label input:first').val();
                // val1 = $(this).parent().find('input:last').val();
              $.get('/defaultadd',{id:id},function(data){

                // alert(data);
                if (data==1) {
                    de.removeClass('adefault');
                    de.html('默认地址');
                    de.addClass('notadefault');

                     node.removeClass('notadefault');
                    node.html('设置默认地址');
                    node.addClass('adefault');
                    alert('设置成功');


                }
              });

            });


            $('.notadefault').click(function(){
               node=$(this)
                id=$(this).parent().find('.radio-label input:first').val();
                // val1 = $(this).parent().find('input:last').val();
              $.get('/defaultadd',{id:id},function(data){

                // alert(data);
                if (data==1) {
                    node.removeClass('adefault');
                    node.html('默认地址');
                    node.addClass('notadefault');

                     de.removeClass('notadefault');
                    de.html('设置为默认地址');
                    de.addClass('adefault');
                    alert('设置成功');

                }
           });
             
		});
        //获取订单总价数据
		tal=$('#zongjia').html();
		var str = new String(tal);
		var tals=str.slice(1,5);
		//触发change事件
        $('#coupon').change(function(){ 
        	id=$(this).val();
        	//alert(1);
        	//通过id 去获取值
        	$.get('/docoupons',{id:id},function(data){ 
        		if(data){
        			//alert(data['lowmoney'])
        			//alert(tals);
        			if(tals>=parseInt(data['lowmoney'])){
        				$('.youhui').html(data['pname']);
        				//计算总价 判断是满减还是折扣
        				if(data['type']==0){ 
        					jianman=$('#jiner').html('￥'+(tals-data['money']));
        					$('.favour-value').html('已优惠:￥'+(tals-(tals-data['money'])));
        				}else{ 

        					zhekou=$('#jiner').html('￥'+(tals*(data['discount']/10)).toFixed(2));
        					$('.favour-value').html('已优惠:￥'+((tals-(tals*(data['discount']/10)).toFixed(2))).toFixed(2));
        				}

        			}else{ 
        				alert('不满足优惠条件,请换一个优惠券');
        				//$('#optis').attr('disabled');
        			}
        		}
        	});
        });

            // });

            // 判断用户是否有地址
        $('.shopcart-form__box').submit(function(){
            if($('input[name=default]').val()) {
                return true;
            } else {

            alert('你还未选地址');
            return false;
            }

        })

        </script>




@endsection