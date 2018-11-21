@extends("Admin.public")
@section('main')

<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">修改广告</i>
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
    <form action="/adminadvent/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data"> 
  <div class="control-group"> 
   <label class="control-label">原图片</label> 
   <div class="controls"> 
   <img src="{{$data->pic}}" width="100px" height="100px">
   </div> 
  </div>
  <div class="control-group"> 
   <label class="control-label">新图片</label> 
   <div class="controls"> 
    <input type="file" class="default" name="pic"  value=""/> 
   </div> 
  </div>
  <div class="control-group "> 
      <label class="control-label" for="inputWarning">网址</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="url" value="{{$data->url}}"/> 
       <span class="help-inline"></span> 
      </div> 
     </div>  
  <div class="control-group "> 
     <label class="control-label">选择状态</label> 
     <div class="controls"> 
      <label class="radio"> 
       <div class="radio">
        <span class="checked"><input type="radio" name="status" value="0" @if($data->status==0) checked @endif /></span>
       </div>不展示</label> 
      <label class="radio"> 
       <div class="radio">
        <span class=""><input type="radio" name="status" value="1" @if($data->status==1) checked @endif/></span>
       </div>展示</label> 
     </div>
  </div>
   <div class="control-group"> 
   <label class="control-label">描述</label> 
   <div class="controls"> 
   <textarea cols="10" name="descr" value="" required>{{$data->descr}}</textarea>
   </div> 
  </div>
     <div class="form-actions"> 
      <button type="submit" class="btn blue">修改</button> 
    
     </div>
     <input type="hidden" value="{{$data->id}}" name="id">
     {{method_field('PUT')}} 
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
  <script>
 // alert($);
  </script>
@endsection
@section("title",'修改广告');