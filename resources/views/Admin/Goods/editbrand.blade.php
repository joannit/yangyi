@extends("Admin.public")
@section('main')
<style>
    .img{height: 70px;width: 50px;margin: 0px;}
</style>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder">修改商品品牌</i>
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
    <form action="/updatebrand" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group success">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{$name}}" disabled />
       <span class="help-inline"></span>
      </div>
     </div>



  <div class="control-group success">
   <label class="control-label">选择所属商品</label>
   <div class="controls">
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="id" required>
    <option value="">选择品牌</option>
  @foreach($data as $value)
  <option value="{{$value->id}}">{{$value->name}}</option>
  @endforeach
    </select>
   </div>
  </div>

   {{csrf_field()}}
     <div class="form-actions">
     <input type="hidden" name="gid" value="{{$gid}}">
      <button type="submit" class="btn blue">Save</button>
      <a href="/admin/goods" class="btn">Cancel</a>
     </div>

    </form>
    <!-- END FORM-->
   </div>
  </div>

@endsection
@section("title",'修改商品');