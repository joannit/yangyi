@extends('Home.Personal.public')
@section('right')
<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-积分平台</div>
					<ul class="nav user-nav__title" role="tablist">
						<li role="presentation" class="nav-item active"><a href="#useful" aria-controls="useful" role="tab" data-toggle="tab">未使用</a></li>
					<li role="presentation" class="nav-item "><a href="/couponsss">已使用</a></li>
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
									<a href="/" class="coupon-ft">立即使用</a>
								</div>	
							@endforeach()
							</div>
					
					</div>
				</div>
			</div>
@endsection
@section('title','个人中心')