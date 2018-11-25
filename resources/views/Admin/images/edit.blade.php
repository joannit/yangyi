@extends("Admin.public")
@section('main')
<style>
    .img{height: 70px;width: 50px;margin: 0px;}
</style>
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">修改轮播图</i>
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
    <form action="/adminimages/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group success"> 
   <label class="control-label">选择状态</label> 
   <div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="status"> 
        <option value="1">上架</option> 
        <option value="0" @if($data->status ==1) selected @endif>下架</option>
    </select> 
   </div> 
  </div>
  <div class="control-group success"> 
   
   <label class="control-label">选择新图片</label> 
   <div class="controls"> 
    <input type="file" class="default" name="pic" /><br>
   </div> 
  </div>
  <div class="control-group success"> 
   <label class="control-label">原图片</label> 
   <div class="controls"> 
    <div class="img"><img src="/uploads/{{$data->pic}}" alt=""></div>
   </div> 
  </div>
   {{ method_field('PUT') }}
   {{csrf_field()}}
     <div class="form-actions"> 
      <button type="submit" class="btn blue">保存</button> 
      <a href="/adminimages" class="btn">取消</a> 
     </div> 
     
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>

@endsection
@section("title",'修改轮播图');