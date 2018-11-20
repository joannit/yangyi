@extends('Home.Personal.public')
@section('right')
<div class="pull-right">
                <div class="user-content__box clearfix bgf">
                    <div class="title">账户信息-个人资料</div>
                    <div class="port b-r50" id="crop-avatar">
                        <div class="img" data-original-title="" title=""><img src="/static/home/images/icons/default_avt.png" class="cover b-r50"></div>
                    </div>
                <form action="/personal/{{session('user')['id']}}" class="user-setting__form" role="form" method="post" enctype="multipart/form-data">
                        <div class="user-form-group">
                            <label for="user-id">用户名：</label>
                            {{session('user')['name']}}
                        </div>
                        <div class="user-form-group">
                            <label for="user-id">昵称</label>
                            <input type="text" name="name" id="user-id" placeholder="请输入您的昵称" required >
                        </div>
                        <div class="user-form-group">
                            <label>等级：</label>
                            普通会员 
                        </div>
                        <div class="user-form-group">
                            <label>性别：</label>
                            <label><input type="radio" name="sex" value="0" checked><i class="iconfont icon-radio" ></i> 男士</label>
                            <label><input type="radio" name="sex" value="1"><i class="iconfont icon-radio" ></i> 女士</label>
                            <label><input type="radio" name="sex" value="2"><i class="iconfont icon-radio" ></i> 保密</label>
                        </div>
                        <div class="user-form-group">
                            <label>生日：</label>
                            <label><span class="Zebra_DatePicker_Icon_Wrapper" style="display: inline-block; position: relative; float: none; top: auto; right: auto; bottom: auto; left: auto;"><input type="text" class="datepicker"  placeholder="请选择您的出生日期" readonly="readonly" style="position: relative; top: auto; right: auto; bottom: auto; left: auto;" name="birthday"><button type="button" class="Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside_Right" style="top: -21px; right: 0px;">Pick a date</button></span></label>
                        </div>
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="user-form-group">
                            <label>更换头像：
                             <input type="file" name="pic">
                         </label>
                        </div>
                        <div class="user-form-group">
                            <button type="submit" class="btn">确认修改</button>
                        </div>
            </form>
                    <script src="/static/home/js/zebra.datepicker.min.js"></script>
                    <link rel="stylesheet" href="/static/home/css/zebra.datepicker.css">
                    <script>
                        $('input.datepicker').Zebra_DatePicker({
                            default_position: 'below',
                            show_clear_date: false,
                            show_select_today: false,
                        });
                    </script>
                </div>
            </div>
@endsection
@section('title','个人资料')
