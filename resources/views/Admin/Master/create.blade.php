<!-- 设置标题 -->
@section('title','添加管理员')
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
     <i class="icon-user" ></i>添加管理员
    </div>

   </div>
   <div class="portlet-body form" style="display: block;">
    <!-- BEGIN FORM-->
    <form action="/admin/master" method="post" class="form-horizontal">
     <div class="control-group">
      <label class="control-label">管理员名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" name="admin_name" value="{{old('admin_name')}}" placeholder="会员名称由6-16任意位数字、字母、下划线组成"/>
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">管理员密码</label>
      <div class="controls">
       <input class="span6 m-wrap" type="password" placeholder="密码由6-16位任意数字、字母、下划线组成" name="admin_password" />
       <!-- <span class="help-inline"></span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">确认密码</label>
      <div class="controls">
       <input class="span6 m-wrap" type="password" placeholder="密码由6-16任意位数字、字母、下划线组成"  name="admin_repassword" />
      <!--  <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">
      手机号码</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap popovers" name="admin_phone" value="{{old('admin_phone')}}" />
      </div>
     </div>

         <div class="control-group">
      <label class="control-label">管理员等级</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="rid">


      <option value="1"  @if(old('rid')==1) selected @endif
>超级级管理员</option>
      <option value="2" @if(old('rid')==2) selected @endif>普通管理员</option>


       </select>
      </div>
     </div>



     <div class="control-group">
      <label class="control-label">状态</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="admin_status">


      <option value="0"  @if(old('admin_status')==0) selected @endif
>禁用</option>
      <option value="1" @if(old('admin_status')==1) selected @endif>激活</option>

       </select>
      </div>
     </div>

     <div class="form-actions">
      <button type="submit" class="btn blue">添加</button>
      <button type="reset" class="btn">重置</button>
     </div>
     {{csrf_field()}}
    </form>
    <!-- END FORM-->
   </div>
  </div>
 </body>
</html>
@endsection()