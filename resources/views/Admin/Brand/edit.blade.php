@extends("Admin.public")
@section('main')

  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder">品牌信息修改</i>
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
    <form action="/admin/brand/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group ">
      <label class="control-label" for="inputWarning">品牌名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{$data->name}}"/>
       <span class="help-inline"></span>
      </div>
     </div>
     <div class="control-group ">
    <input type="hidden" name="tid" value="{{$data->tid}}">
  </div>

  <div class="control-group">
   <label class="control-label">新上传品牌图片</label>
   <div class="controls">
    <input type="file" class="default" name="bpic" />
   </div>
   <div style="float:right"><h4>旧图片(若上传新图片，就图片会被覆盖)</h4>
   <img src="/uploads/brand/{{$data->bpic}}" style="width:300px;height:300px"  alt="" >
   </div>
  </div>
     <div class="form-actions">
      <button type="submit" class="btn blue">修改</button>
     <a href="/admin/brand/{{$data->tid}}" class="btn btn green">取消</a>
     </div>
     {{csrf_field()}}
     {{method_field('PATCH')}}
    </form>
    <!-- END FORM-->
   </div>
  </div>

@endsection
@section("title",'品牌信息修改');