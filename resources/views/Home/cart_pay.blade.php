@extends('Home.public')
@section('main')
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">购物车</div>
			</div>
		</div>
	</div>
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form action="/orderinsert" class="shopcart-form__box form" method="post">
					<div class="addr-radio">
                        @if (count($address))
                        @foreach($address as $val)
                        <div class="addressdefalut radio-line radio-box @if($val->default==1) active @endif">
                            <label class="radio-label ep" title="{{$val->address}}
                                （{{$val->aname}} 收） {{$val->aphone}}">
                                <input name="addid" @if($val->default==1) checked @endif value="{{$val->id}}" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>{{$val->address}}
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
                        <div class=" active add">
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
									<th width="150"></th>
									<th width="120">商品信息</th>
									<th width="120">单价</th>
									<th width="120">数量</th>
									<th width="120">每件优惠</th>
									<th width="120">运费</th>
									<th width="120">总价</th>
									<th width="120">实际付款</th>
								</tr>
							</thead>
							<tbody>

								@foreach($list as $row)
								<tr>
									<th scope="row"><a href="item_show.html"><div class="img"><img src="/uploads/goods/{{$row->pic}}" alt="" class="cover"></div></a></th>
									<td>
										<div class="name ep3">{{$row->name}}</div>
										<div class="type c9">颜色分类：{{$row->cname}} <br> 尺码：{{$row->value}}</div>
									</td>
									<input type="hidden" name="cid[]" value="{{$row->id}}">
									<td>¥<span>{{$row->gprice}}</span></td>
									<td>{{$row->num}}</td>
									<td>{{$row->discount/10}}折</td>
									<td>¥0.0</td>
									<td>¥<span>{{$row->gprice*$row->num}}</span></td>
									<td class="my">¥<span>{{number_format($row->gprice*($row->discount/100)*($row->num),2,".","")}}</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-left text-left">
							<div class="info-line text-nowrap">购买时间：<span class="c6">{{$ordertime}}</span></div>
							<div class="info-line text-nowrap">交易类型：<span class="c6">担保交易</span></div>
							<div class="info-line text-nowrap">交易号：<span class="c6">{{$orderid}}</span></div>
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
<!-- 							<script>
								$('#coupon').bind('change',function() {
									console.log($(this).val());
								})
							</script> -->
							<div class="info-line">优惠活动：<span class="c6">无</span></div>
							<div class="info-line">运费：<span class="c6">¥0.00</span></div>
							合计：<b class="fz18 cr">¥</b></div>
							<div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
						</div>
					</div>
					<div class="user-form-group shopcart-submit">
						<input type="hidden" name="tprice" value="">
						<input type="hidden" name="createtime" value="{{$ordertime}}">
						<input type="hidden" name="ordernum" value="{{$orderid}}">
						<input type="hidden" name="pay" value="">
						{{csrf_field()}}
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
	<script type="text/javascript">
		// 表单提交时间
		$('.form').submit(function(){
			if($('.add').html()){
				alert('请先添加地址');
				return false;
			}else{
				return true;
			}
		})
		//实际付款总计
		var m = 0;
		var s = 0;
		$('.my').each(function(){
			m+= parseFloat($(this).find('span').html());
			s+=parseFloat($(this).prev().find('span').html());
		});
		// alert(m);
		$('.fz18').html(m);
		$('input[name=pay]').val(m);
		$('input[name=tprice]').val(s.toFixed(2));

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
                    de.html('设置默认地址');
                    de.addClass('adefault');
                    alert('设置成功');

                }
              });
              });
            </script>

@endsection