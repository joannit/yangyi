<!-- 设置标题 -->
@section('title','管理员信息修改')
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
     <i class="icon-user" ></i>修改管理员信息
    </div>

   </div>
   <div class="portlet-body form" style="display: block;">
    <!-- BEGIN FORM-->
    <form action="/admin/master/{{$data->id}}" method="post" class="form-horizontal">
     <div class="control-group">
      <label class="control-label">管理员名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" name="admin_name" value="{{$data->admin_name or old('admin_name')}}" placeholder="会员名称由6-16任意位数字、字母、下划线组成" disabled/>
     <!--   <span class="help-inline">Some hint here</span> -->
      </div>
     </div>


     <div class="control-group">
      <label class="control-label">管理员等级</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="rid">

        <option value="1"  @if($data->rid==1 || old('admin_status')==1) selected @endif>
          超级管理员</option>
        <option value="2"  @if($data->rid==2 || old('admin_status')==2) selected @endif>
        普通管理员</option>



       </select>
      </div>
      </div>

      <div class="control-group">
      <label class="control-label">状态</label>
      <div class="controls">
       <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="admin_status">


      <option value="0"  @if($data->admin_status==0 || old('admin_status')==0) selected @endif
>禁用</option>
      <option value="1" @if($data->admin_status==1 ||  old('admin_status')==1) selected @endif>激活</option>

       </select>
      </div>
     </div>
    {{csrf_field()}}
    {{method_field('PUT')}}
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