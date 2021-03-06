<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="/static/home/favicon.ico">
	<link rel="stylesheet" href="/static/home/css/iconfont.css">
	<link rel="stylesheet" href="/static/home/css/global.css">
	<link rel="stylesheet" href="/static/home/css/bootstrap.min.css">
	<link rel="stylesheet" href="/static/home/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/static/home/css/swiper.min.css">
	<link rel="stylesheet" href="/static/home/css/styles.css">
	<script src="/static/home/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/static/home/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/static/home/js/swiper.min.js" charset="UTF-8"></script>
	<script src="/static/home/js/global.js" charset="UTF-8"></script>
	<script src="/static/home/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>
	<title>羊燚网商</title>
	<style>
	.iconfontce:hover{color: #f2f2f2};


	#zxd_x{width:20px; height:20px;text-align:center;font-size:16px;color:red;position:absolute;right:0px; top:0px;cursor:pointer;
	  }


	</style>


</head>
<body>

		<!--广告-->
		@if(count($advent))
	<div style="z-index:999;display: block; position: fixed; right: 10px; top: 200px; " id="guanggao">
	<div id="zxd_x" style="background-color:#ccc;">
	<b style="margin-left:100px;">广告位</b>
	<a title="点击关闭" style="text-decoration:none"><b style="color:red;margin-left:65px;cursor:pointer" id="anniu">X</b></a>
	</div>

	<div class="content">
	<a href="">
	<img src="{{$advent->pic}}" width="220px"height="282px;">
	</a>
	</div >
	<b style="color:orange;margin-left:60px">{{$advent->descr}}</b>
	</div>
	@endif
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			<div class="pull-left">
				<div class="pull-left">嗨，欢迎来到<span class="cr">羊燚</span></div>
			</div>
			<div class="pull-right">
			@if(!session('user'))
				<a href="/login"><span class="cr">登录</span></a>
				<a href="/homeregister">注册</a>
			@else
				<span>欢迎 {{session('user')['name']}}</span>
				<a href="/outlogin">退出</a>
				<a href="/personal">个人中心</a>

				<a href="/myorder">我的订单</a>
				<!-- <a href="udai_integral.html">积分平台</a> -->
			@endif

			</div>
		</div>
	</div>

	  @if(session('error'))
          <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <center><strong>{{session('error')}}</strong></center>
        </div>
        @endif
	<!-- 搜索栏 -->
	<div class="top-search">
		<div class="inner">
			<a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="羊燚" class="cover"></a>
			<div class="search-box">
				<form class="input-group" action="/home/type" method="get" >
					<input placeholder="Ta们都在搜羊燚" type="text" name="keywords">
					<span class="input-group-btn">
						<button type="type">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</form>
				<p class="help-block text-nowrap">
					<a href="">连衣裙</a>
					<a href="">裤</a>
					<a href="">衬衫</a>
					<a href="">T恤</a>
					<a href="">女包</a>
					<a href="">家居服</a>
					<a href="">2017新款</a>
				</p>
			</div>
			<div class="cart-box">
				<a href="/cart" class="cart-but">
					<i class="iconfont icon-shopcart cr fz16"></i> 购物车
				</a>
			</div>
		</div>
	</div>
	<!-- 首页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
				<div class="cat-list__box">
				@foreach($type as $top)
					<div class="cat-box">
						<div class="title">
							<i class="iconfont  ce"></i><a  class="iconfontce" style="color:white;text-decoration:none">{{$top->name}}</a>
						</div>
						<ul class="cat-list clearfix">
						@foreach($top->son as $rows)
							<li><a href="/home/type/{{$rows->id}}"  style="color:#999;text-decoration:none">{{$rows->name}}</a></li>
						@endforeach
						</ul>
						<div class="cat-list__deploy">
							<div class="deploy-box">
							@foreach($top->son as $rows)
								<div class="genre-box clearfix">
									<span class="title">{{$rows->name}}：</span>
									<div class="genre-list">
									@foreach($rows->son as $row)
										<a href="/home/type/{{$row->id}}">{{$row->name}}</a>
										@endforeach
									</div>
								</div>
								@endforeach
							</div>
						</div>

					</div>
					@endforeach
				</div>
			</div>
			<!-- 首页导航栏结束 -->
			<ul class="nva-list">
				<a href="index.html"><li class="active">首页</li></a>
				<a href="/aboutus"><li>企业简介</li></a>
				<!-- <a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="class_room.html"><li>U袋学堂</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a> -->
			</ul>
			<div class="user-info__box">
				<div class="login-box">
					<div class="avt-port">
						<img src="/static/home/images/icons/default_avt.png" alt="欢迎来到U袋网" class="cover b-r50">
					</div>
					@if(session('user'))
					<!-- 已登录 -->
					<div class="name c6">Hi~ <span class="cr">{{session('user')['name']}}</span></div>
					<div class="point c6">@if($level->user_level)VIP用户 @else 普通会员@endif</div>
					@else
					<!-- 未登录 -->
					<div class="name c6">Hi~ 你好</div>
					<div class="point c6"><a href="">点此登录</a>，发现更多精彩</div>
					@endif
					<div class="report-box">

						<!-- <span class="badge">+30</span> -->
						<!-- <a class="btn btn-info btn-block disabled" href="#" role="button">已签到1天</a> -->
						<!-- <a class="btn btn-primary btn-block" href="#" role="button">签到领积分</a> -->
					</div>
				</div>
				<!-- <div class="agent-box">
					<a href="#" class="agent">
						<i class="iconfont icon-fushi"></i>
						<p>申请网店代销</p>
					</a>
					<a href="javascript:;" class="agent">
						<i class="iconfont icon-agent"></i>
						<p><span class="cr">9527</span>位代销商</p>
					</a>
				</div> -->
				<div class="verify-qq">
					<div class="title">
						<i class="fake"></i>
						<span class="fz12">羊燚祝您生活愉快</span>
					</div>
					<!-- <form class="input-group">
						<input class="form-control" placeholder="输入客服QQ号码" type="text">
						<span class="input-group-btn">
							<button class="btn btn-primary submit" id="verifyqq" type="button">验证</button>
						</span>
					</form> -->
					<script>
						$(function() {
							$('#verifyqq').click(function() {
								DJMask.open({
								　　width:"400px",
								　　height:"150px",
								　　title:"羊燚提示您：",
								　　content:"<b>该QQ不是客服-谨防受骗！</b>"
							　　});
							});
						});
					</script>
				</div>
				<div class="tags">
					<div class="tag"><i class="iconfont icon-real fz16"></i> 品牌正品</div>
					<div class="tag"><i class="iconfont icon-credit fz16"></i> 信誉认证</div>
					<div class="tag"><i class="iconfont icon-speed fz16"></i> 当天发货</div>
					<div class="tag"><i class="iconfont icon-tick fz16"></i> 人工质检</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 顶部轮播 -->
    <div class="swiper-container banner-box">
        <div class="swiper-wrapper">
        	@foreach($images as $i)
            <div class="swiper-slide"><a href="/home/type?keywords=男士"><img src="/uploads/{{$i->pic}}" class="cover"></a></div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- 首页楼层导航 -->

	<!-- 楼层内容 -->
	<div class="content inner" style="margin-bottom: 40px;">
		<section class="scroll-floor floor-1 clearfix">
			<div class="pull-left">
				<div class="floor-title">
					<i class="iconfont icon-tuijian fz16"></i> 爆款推荐
					<a href="" class="more"><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<a class="left-img hot-img" href="">
						<img src="/static/home/images/floor_1.jpg" alt="" class="cover">
					</a>
					<div class="right-box hot-box">
					@foreach($tops as $hot)
						@if(in_array($hot->id,$goodsinfo))
						<a href="/homegoodsinfo/{{$hot->id}}" class="floor-item">
							<div class="item-img hot-img">
								<img src="/uploads/goods/{{$hot->pic}}" alt="{{$hot->name}}" class="cover">
							</div>
							<div class="price clearfix">
								<span class="pull-left cr fz16">￥{{$hot->price}}</span>
								<span class="pull-right c6">进货价</span>
							</div>
							<div class="name ep" title="{{$hot->name}}">{{$hot->name}}</div>
						</a>
						@endif
						@endforeach

					</div>
				</div>
			</div>
			<div class="pull-right">
				<div class="floor-title">
					<i class="iconfont icon-horn fz16"></i> 平台公告
					<a href="/home/notice" class="more" ><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<div class="notice-box bgf5">
						<div class="swiper-container">
							<div class="swiper-wrapper">
							@foreach($notice as $nt)
								<a class="swiper-slide ep" href="/home/notice?id={{$nt->id}}" target="_blank">[公告] {{$nt->title}}</a>

							@endforeach
							</div>
						</div>
					</div>
					<div class="buts-box bgf5">
						<div class="but-div">
							<a href="http://www.kuaidi100.com"style="color: #999;">
								<i class="but-icon"></i>
								<p>物流查询</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>热卖专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>满减专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>折扣专区</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>


		<input type="hidden" {{$i=0}}>
		@foreach($type as $list)
		<!-- 首页商品开始 -->
		<section class="scroll-floor floor-3">
			<div class="floor-title">
				<i class="iconfont  fz16">{{$list->name}}</i>
				<div class="case-list fz0 pull-right">
				<!-- 分类上装下装 -->
				@foreach($list->son as $listson)
					<a href="/home/type/{{$listson->id}}" target="_blank">{{$listson->name}}</a>
				@endforeach
				</div>
			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="">
				<!-- 首页商品大图 -->
					<img src="/static/home/images/floor_{{$list->id}}.jpg" alt="" class="cover">
					<!-- 大图结束 -->
				</a>
				<div class="right-box">
				<!-- 商品子分类开始 -->
					@foreach($typeall[$i] as $alls)
					@if(in_array($alls->id,$goodsinfo))
					<a href="/homegoodsinfo/{{$alls->id}}" class="floor-item" title="{{$alls->name}}">
						<div class="item-img hot-img">
							<img src="/uploads/goods/{{$alls->pic}}" alt="纯色圆领短袖T恤活a动衫弹" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{$alls->price}}</span>
							<!-- <span class="pull-right c6">进货价</span> -->
							<span class="pull-right c6" style="color:red;margi" title="品牌:{{$alls->bname}}">品牌:{{$alls->bname}}</span>
						</div>
						<div class="name ep" title="{{$alls->name}}">
						<span style="color:red">商品名:</span>{{$alls->name}}
						</div>

					</a>
					@endif
					@endforeach
					<!-- 商品子分类结束 -->
				</div>
			</div>
		</section>
		<input type="hidden" value="{{$i++}}">
		@endforeach

	</div>
	<script>

		//隐藏广告
		$('#anniu').click(function(){
			//alert(1);
			$('#guanggao').hide();
		})



			$(document).ready(function(){

			// 顶部banner轮播
			var banner_swiper = new Swiper('.banner-box', {
				autoplayDisableOnInteraction : false,
				pagination: '.banner-box .swiper-pagination',
				paginationClickable: true,
				autoplay : 5000,
			});
			// 新闻列表滚动
			var notice_swiper = new Swiper('.notice-box .swiper-container', {
				paginationClickable: true,
				mousewheelControl : true,
				direction : 'vertical',
				slidesPerView : 10,
				autoplay : 2e3,
			});
			// 楼层导航自动 active
			$.scrollFloor();
			// 页面下拉固定楼层导航
			$('.floor-nav').smartFloat();
			$('.to-top').toTop({position:false});

	});

	</script>
	<!-- 右侧菜单 -->
	@if(session('user'))
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/personal" class="r-item-hd">
					<i class="iconfont icon-user"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/cart" class="r-item-hd">
					<i class="iconfont icon-cart" data-badge="10"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/house" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<!-- <li class="r-toolbar-item">
				<a href="" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li> -->
			<!-- <li class="r-toolbar-item">
				<a href="issues.html" class="r-item-hd">
					<i class="iconfont icon-liuyan"></i>
					<div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
				</a>
			</li> -->
			<li class="r-toolbar-item to-top">
				<i class="iconfont icon-top"></i>
				<div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
			</li>
		</ul>
	</div>
	@endif
	<!-- 底部信息 -->
	<div class="footer">
		<div class="footer-tags">
			<div class="tags-box inner">
				<div class="tag-div">
					<img src="/static/home/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="/static/home/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="/static/home/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="/static/home/images/icons/footer_4.gif" alt="信誉认证">
				</div>
			</div>
		</div>
		<div class="footer-links inner">
			<dl>
				<dt>羊燚</dt>
				<a href="/aboutus"><dd>企业简介</dd></a>
				<!-- <a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a> -->
				<!-- <a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a> -->
			</dl>
			<dl>
				<dt>服务中心</dt>
				<!-- <a href="temp_article/udai_article1.html"><dd>售后服务</dd></a> -->
				<!-- <a href="temp_article/udai_article2.html"><dd>配送服务</dd></a> -->
				<!-- <a href="temp_article/udai_article3.html"><dd>用户协议</dd></a> -->
				<!-- <a href="temp_article/udai_article4.html"><dd>常见问题</dd></a> -->
			</dl>
			<!-- <dl>
				<dt>新手上路</dt>
				<a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
				<a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
				<a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
				<a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
			</dl> -->
		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				<!-- <a href="agent_level.html"><li>网店代销</li></a> -->
				<a href="/link"><li>友情链接</li></a>
				<!-- <a href="udai_about.html"><li>联系我们</li></a> -->
				<a href="/aboutus"><li>企业简介</li></a>
				<!-- <a href="temp_article/udai_article5.html"><li>新手上路</li></a> -->
			</ul>
			<!-- 版权 -->
			<p class="copyright">
				© 2018-2020 羊燚<br>
				广州福星阁了解一下 联系我，我叫老汉，喜欢推车
			</p>
		</div>
	</div>
</body>
</html>
