@extends("Admin.public")
@section('main')

  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder">添加品牌</i>
    </div>
  <!--   <div class="tools">
     <a href="javascript:;" class="collapse"></a>
     <a href="#portlet-config" data-toggle="modal" class="config"></a>
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a>
    </div> -->
   </div>
   <div class="portlet-body form">
    <h3 class="block"></h3>
    <!-- BEGIN FORM-->
    <form action="/admin/brand" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group ">
      <label class="control-label" for="inputWarning">品牌名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/>
       <span class="help-inline"></span>
      </div>
     </div>
     <div class="control-group ">

  </div>
  <input type="hidden" name="tid" value="{{$tid}}">
  <div class="control-group">
   <label class="control-label">品牌图片</label>
   <div class="controls">
    <input type="file" class="default" name="bpic" />
   </div>
  </div>
     <div class="form-actions">
      <button type="submit" class="btn blue">Save</button>
      <button type="reset" class="btn">Cancel</button>
     </div>
     {{csrf_field()}}
    </form>
    <!-- END FORM-->
   </div>
  </div>

@endsection
@section("title",'添加商品');