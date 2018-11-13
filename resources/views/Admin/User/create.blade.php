<!-- 设置标题 -->
@section('title','添加会员')
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
     <i class="icon-user" ></i>会员添加
    </div>

   </div>
   <div class="portlet-body form" style="display: block;">
    <!-- BEGIN FORM-->
    <form action="/admin/user" method="post" class="form-horizontal">
     <div class="control-group">
      <label class="control-label">会员名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" name="user_name" value="{{old('user_name')}}" placeholder="会员名称由6-16任意位数字、字母、下划线组成"/>
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">密码</label>
      <div class="controls">
       <input class="span6 m-wrap" type="password" placeholder="密码由6-16位任意数字、字母、下划线组成" name="user_password" />
       <!-- <span class="help-inline"></span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">确认密码</label>
      <div class="controls">
       <input class="span6 m-wrap" type="password" placeholder="密码由6-16任意位数字、字母、下划线组成"  name="user_repassword" />
      <!--  <span class="help-inline">Some hint here</span> -->
      </div>
     </div>
     <div class="control-group">
      <label class="control-label">
      手机号码</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap popovers" name="user_phone" value="{{old('user_phone')}}" />
      </div>
     </div>


     <div class="control-group">
      <label class="control-label">是否激活</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="user_status">


      <option value="0"  @if(old('user_status')==0) selected @endif
>禁用</option>
      <option value="1" @if(old('user_status')==1) selected @endif>激活</option>







       </select>
      </div>
     </div>

     <div class="control-group">
      <label class="control-label">{{old('user_level')}}会员等级</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="user_level">


       <option value="0"  @if(old('user_level')==0) selected @endif>普通会员</option>



      <option value="1" @if(old('user_level')==1) selected @endif>银牌会员</option>




     <option value="2"  @if(old('user_level')==2) selected @endif>超级会员</option>


     <option value="3"  @if(old('user_level')==3) selected  @endif>顶级vip</option>

       </select>
      </div>
     </div>



     <div class="form-actions">
      <button type="submit" class="btn blue">添加</button>
      <button type="button" class="btn">重置</button>
     </div>
     {{csrf_field()}}
    </form>
    <!-- END FORM-->
   </div>
  </div>
 </body>
</html>
@endsection()