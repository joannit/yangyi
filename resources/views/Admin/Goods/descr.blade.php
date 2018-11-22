@extends("Admin.public")
@section('main')
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">商品描述</i>
    </div> 
    <div class="tools"> 
     <a href="javascript:;" class="collapse"></a> 
     <a href="#portlet-config" data-toggle="modal" class="config"></a> 
     <a href="javascript:;" class="reload"></a> 
     <a href="javascript:;" class="remove"></a> 
    </div> 
   </div> 
   <div class="portlet-body form"> 
    <h3 class="block"></h3> 
    <!-- BEGIN FORM--> 
    <form action="/admin/gdescr/{{$info->id}}" class="form-horizontal" method="post"> 
     <div class="control-group ">
      <label class="control-label" for="inputWarning">商品名</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" value="{{$info->name}}" disabled /> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">内容</label> 
      <div class="controls"> 
       <script id="editor" type="text/plain" name="descr" style="width:700px;height:500px;">{!!$info->descr!!}</script>
       <span class="help-inline"></span> 
      </div> 
     </div>
     <div class="form-actions"> 
      <button type="submit" class="btn blue">Save</button> 
      <a href="/admin/goods" class="btn">Cancel</a> 
     </div> 
     {{method_field('PUT')}}
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');
</script>   
@endsection
@section("title",'商品描述');