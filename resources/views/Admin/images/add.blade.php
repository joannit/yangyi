@extends("Admin.public")
@section('main')
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">添加轮播图</i>
    </div> 
   </div> 
  </div>  
    <h3 class="block"></h3> 
    <form action="/adminimages" class="form-horizontal" method="post" enctype="multipart/form-data"> 
  <div class="control-group"> 
   <label class="control-label">选择图片</label> 
   <div class="controls"> 
    <input type="file" class="default" name="pic" /> 
   </div> 
  </div>
     <div class="form-actions"> 
      <button type="submit" class="btn blue">保存</button> 
      <a href="/adminimages" class="btn blue">取消</a>
     </div> 
     {{csrf_field()}}
    </form> 
@endsection
@section('title','轮播图')