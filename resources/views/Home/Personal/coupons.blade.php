@extends('Home.Personal.public')
@section('right')
<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-积分平台</div>
					<ul class="nav user-nav__title" role="tablist">
						<li role="presentation" class="nav-item active"><a href="#useful" aria-controls="useful" role="tab" data-toggle="tab">未使用</a></li>
						<li role="presentation" class="nav-item "><a href="#used" aria-controls="used" role="tab" data-toggle="tab">已使用</a></li>
						<li role="presentation" class="nav-item "><a href="#overdue" aria-controls="overdue" role="tab" data-toggle="tab">已过期</a></li>
					</ul>
					
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="useful">
						
							<div class="coupon-list">
							@foreach($data as $row)
								<div class="coupon">
								@if($row->type==0)
									<div class="coupon-hd">
										<b><small class="fz16">¥</small>{{$row->money}}</b>
										<div class="fz12">【使用期限】<br>{{$row->start_time}}至{{$row->end_time}}</div>
									</div>
								@else
								<div class="coupon-hd">
										<b>{{$row->pname}}</b>
										<div class="fz12">【使用期限】<br>{{$row->start_time}}至{{$row->end_time}}</div>
									</div>
								@endif
									<div class="coupon-bd">
										<div class="fz12 c9">券号:{{$row->number}}</div>
										<div class="fz12 c9">规则： 消费需满{{$row->lowmoney}}元</div>
									</div>
									<a href="item_sale_page.html" class="coupon-ft">立即使用</a>
								</div>	
							@endforeach()
							</div>
						
							<div class="dataLists_paginate paging_bootstrap" style="width:300px;line-height:40px;float:left;font-size:20px;">
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="used">
							<div class="coupon-list">
								<div class="empty-msg">哇，居然没有优惠券了？</div>
							</div>
							<div class="page text-right clearfix">
								<a class="disabled">上一页</a>
								<a class="select">1</a>
								<a href="">2</a>
								<a href="">3</a>
								<a class="" href="">下一页</a>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="overdue">
							<div class="coupon-list">
								<div class="coupon"><div class="coupon-hd"><b><small class="fz16">¥</small>2.00</b><div class="fz12">【使用期限】<br>2017.09.20至2017.12.5</div></div><div class="coupon-bd"><div class="fz12 c9">券号：70000503249136</div><div class="fz12 c9">规则： 消费需满50元</div></div><a href="javascript:;" class="coupon-ft">已经过期</a></div>
							</div>
							<div class="page text-right clearfix">
								<a class="disabled">上一页</a>
								<a class="select">1</a>
								<a href="">2</a>
								<a href="">3</a>
								<a class="" href="">下一页</a>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
@section('title','个人中心')