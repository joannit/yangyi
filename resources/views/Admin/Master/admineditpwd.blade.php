<!-- 设置标题 -->
@section('title','个人信息修改')
<!-- 继承公共模板 -->

@extends("Admin.public")
<!-- 设置主zhu -->
@section("main")
<html>
 <head></head>
 <body>
  <div class="portlet box blue" >
   <div class="portlet-title" >
    <div class="caption" style="margin-left:40%;font-size:2em;height:50px;margin-top:25px">
     <i class="icon-user" ></i>个人信息修改
    </div>

   </div>
   <div class="portlet-body form" style="display: block;">
    <!-- BEGIN FORM-->
    <form action="/adminupdatepwd" method="post" class="form-horizontal">
     <div class="control-group">
      <label class="control-label">登录账号名</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" name="admin_name" value="{{$info->admin_name or old('admin_name')}}" placeholder="会员名称由6-16任意位数字、字母、下划线组成" disabled/>
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
      <input type="hidden" name="id" value="{{$info->id}}">
     <div class="control-group">
      <label class="control-label">旧密码</label>
      <div class="controls">
       <input type="password" class="span6 m-wrap" name="oldpassword" value="" placeholder="密码必须是6到16位任意数字字母下划线组成" />
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>

     <div class="control-group">
      <label class="control-label">新密码</label>
      <div class="controls">
       <input type="password" class="span6 m-wrap" name="newpassword" value="" placeholder="密码必须是6到16位任意数字字母下划线组成" />
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">确认新密码</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" name="newrepassword" value="" placeholder="密码必须是6到16位任意数字字母下划线组成" />
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>


    {{csrf_field()}}

     <div class="form-actions">
      <button type="submit" class="btn blue">修改</button>
      <a href="/admin/master" class="btn yellow">放弃</a>
     </div>

    </form>
    <!-- END FORM-->
   </div>
  </div>
 </body>
</html>
@endsection()