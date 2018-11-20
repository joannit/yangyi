@extends('Home.public')

<!-- 搜索栏 -->


@section('serach')

@endsection
@section('main')
<!-- 内页导航栏 -->
    <div class="top-nav bg3">
        <div class="nav-box inner">
            <div class="all-cat">
                <div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
            </div>
            <ul class="nva-list">
                <a href="index.html"><li>首页</li></a>
                <a href="temp_article/udai_article10.html"><li>企业简介</li></a>
                <a href="temp_article/udai_article5.html"><li>新手上路</li></a>
                <a href="class_room.html"><li>U袋学堂</li></a>
                <a href="enterprise_id.html"><li>企业账号</li></a>
                <a href="udai_contract.html"><li>诚信合约</li></a>
                <a href="item_remove.html"><li>实时下架</li></a>
            </ul>
        </div>
    </div>
    @section('body')
    @show


@endsection

