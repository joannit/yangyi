<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
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

    <script src="/static/home/js/bootstrap.min.js" charset="UTF-8"></script>
    <script src="/static/home/js/swiper.min.js" charset="UTF-8"></script>
    <script src="/static/home/js/global.js" charset="UTF-8"></script>
    <script src="/static/home/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>

    <title>@yield('title')</title>

<style>

</style>
</head>
<body>

    <!-- 顶部tab -->
    <div class="tab-header">
        <div class="inner">
            <div class="pull-left">


                <div class="pull-left">嗨，欢迎来到<span class="cr">U袋网</span></div>

            </div>
            <div class="pull-right">
            @if(!session('user'))
                <a href="/login"><span class="cr">登录</span></a>
                <a href="/homeregister">注册</a>
            @else
                <font>欢迎 {{session('user')['name']}}</font>
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


    @section('main')

    @show
    @if(session('user'))

    <div class="right-nav">
        <ul class="r-with-gotop">
            <li class="r-toolbar-item">
                <a href="/personal" class="r-item-hd">
                    <i class="iconfont icon-user" data-badge=""></i>
                    <div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="/cart" class="r-item-hd">

                    <i class="iconfont icon-cart" ></i>
                    <div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
                </a>
            </li>
            <li class="r-toolbar-item">
                <a href="/house" class="r-item-hd">
                    <i class="iconfont icon-aixin"></i>
                    <div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
                </a>
            </li>
           <!--  <li class="r-toolbar-item">
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
           <!--  <li class="r-toolbar-item to-top">
                <i class="iconfont icon-top"></i>
                <div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
            </li> -->
        </ul>
        <!-- <script>
            $(document).ready(function(){ $('.to-top').toTop({position:false}) });
        </script> -->
    </div>
    @endif
    <!-- 底部信息 -->
    <div class="footer" >
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
                <dt>羊燚了解一下</dt>
                <a href="/aboutus"><dd>企业简介</dd></a>
                <!-- <a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a> -->
                <!-- <a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a> -->
            </dl>
            <dl>
                <dt>服务中心</dt>
                <!-- <a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
                <a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
                <a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
                <a href="temp_article/udai_article4.html"><dd>常见问题</dd></a> -->
            </dl>
           <!--  <dl>
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
                <a href="/aboutus"><li>联系我们</li></a>
                <!-- <a href="temp_article/udai_article10.html"><li>企业简介</li></a> -->
                <!-- <a href="temp_article/udai_article5.html"><li>新手上路</li></a> -->
            </ul>
            <!-- 版权 -->
            <p class="copyright">
                © 2018-2020 羊燚 <br>
                广州福星阁
            </p>
        </div>
    </div>
</body>
<script>

</script>
</html>