<!-- 设置标题 -->
@section('title','分配权限')
<!-- 继承公共模板 -->

@extends("Admin.public")
<!-- 设置主zhu -->
@section("main")
<html>
 <head>
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="portlet box blue" >
   <div class="portlet-title" >
    <div class="caption" style="margin-left:40%;font-size:2em;height:50px;margin-top:25px">
     <i class="icon-user" ></i>分配权限(所有管理员默认可进入后台首页)
    </div>

   </div>
   <div class="portlet-body form" style="display: block;">
    <!-- BEGIN FORM-->

    <form action="/adminpower/{{$id}}
" method="post" class="form-horizontal">




      <div class="control-group">

      <div class="controls">
      @foreach($node as $value)

      <input type="checkbox" name="node[]" value="{{$value->id}}" @if(count($data)>0 && in_array($value->id,$data)) checked @endif > <span style="font:20px/5px bold;color">{{$value->nname}}</span><br><br>

      @endforeach

      </div>

     </div>
    {{csrf_field()}}
    {{method_field('PUT')}}
     <div class="form-actions">
      　　
      <button class="btn btn blue">确定</button>
        <a href="" class="btn btn green">返回</a>
     </div>

    </form>

    <!-- END FORM-->
   </div>
  </div>
 </body>
 <script>




 </script>
</html>
@endsection()