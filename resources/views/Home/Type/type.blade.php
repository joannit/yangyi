@extends("Home.public")
@section('main')
	<div class="content inner">
		<section class="filter-section clearfix">
			<ol class="breadcrumb">
				<li><a href="/">首页</a></li>
				<li class="active">商品筛选</li>
			</ol>

			<div class="filter-box">
				<div class="filter-prop-item">
					<span class="filter-prop-title">分类：</span>
					<ul class="clearfix">

						<a href="/home/type/"><li></li></a>

					</ul>
				</div>
				<div class="filter-prop-item">
					<span class="filter-prop-title">颜色：</span>
					<ul class="clearfix">
						<a href=""><li class="active">全部</li></a>
						<a href=""><li>红色</li></a>
						<a href=""><li>粉红</li></a>
						<a href=""><li>蓝色</li></a>
						<a href=""><li>白色</li></a>
					</ul>
				</div>
				<div class="filter-prop-item">
					<span class="filter-prop-title">尺寸：</span>
					<ul class="clearfix">
						<a href=""><li class="active">全部</li></a>
						<a href=""><li>L</li></a>
						<a href=""><li>M</li></a>
						<a href=""><li>S</li></a>
						<a href=""><li>X</li></a>

					</ul>
				</div>
				<div class="filter-prop-item">
					<span class="filter-prop-title">价格：</span>
					<ul class="clearfix">
						<a href=""><li class="active">全部</li></a>

						<a href=""><li>40-80</li></a>
						<a href=""><li>80-100</li></a>
						<a href=""><li>100-150</li></a>
						<a href=""><li>150以上</li></a>
						<form class="price-order">
							<input type="text">
							<span class="cc">-</span>
							<input type="text">
							<input type="button" value="确定">
						</form>
					</ul>
				</div>
			</div>

			<div class="sort-box bgf5">
				<div class="sort-text">排序：</div>
				<a href=""><div class="sort-text">销量 <i class="iconfont icon-sortDown"></i></div></a>
				<a href=""><div class="sort-text">评价 <i class="iconfont icon-sortUp"></i></div></a>
				<a href=""><div class="sort-text">价格 <i class="iconfont"></i></div></a>
				<div class="sort-total pull-right"></div>
			</div>
		</section>
		<section class="item-show__div clearfix">
			<div class="pull-left">
				<div class="item-list__area clearfix">
					@if($list)
					@foreach($list as $row)
					<div class="item-card">
						<a href="/homegoodsinfo/{{$row->id}}" class="photo">
							<img src="/uploads/goods/{{$row->pic}}" alt="" class="cover">
							<div class="name">{{$row->name}} </div>

						</a>
						<div class="middle">
							<div class="price"><small>￥{{$row->price}}</small></div>
							<!-- <div class="sale"><a href="/addcart">加入购物车</a></div> -->
						</div>
						<div class="buttom">
							<div>销量 <b>{{$row->sales}}</b></div>
							<div>评论 <b>1688</b></div>
						</div>
					</div>
					@endforeach
					@else

				<center><font size="5px">未搜索到商品</font></center>
				<!-- 分页 -->
					@endif
			</div>
			</div>
			<div class="pull-right">

				<div class="desc-segments__content" style="height:926px">
					<div class="lace-title">
						<span class="c6">爆款推荐</span>
					</div>
					<div class="picked-box">
						@if(count($tops))
						@foreach($tops as $val)
						<a href="/homegoodsinfo/{{$val->id}}" class="picked-item"><img src="/uploads/goods/{{$val->pic}}" alt="{{$val->name}}" class="cover"><span class="look_price">¥{{$val->price}}</span></a>
						@endforeach
						@endif

					</div>
				</div>
			</div>
		</section>
	</div>
	@endsection
	@section("title",'商品分类')