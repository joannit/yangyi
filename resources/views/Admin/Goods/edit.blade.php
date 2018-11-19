@extends("Admin.public")
@section('main')
<style>
    .img{height: 70px;width: 50px;margin: 0px;}
</style>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder">修改商品</i>
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
    <form action="/admin/goods/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group success">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{$data->name}}" />
       <span class="help-inline"></span>
      </div>
     </div>
     <div class="control-group success">
      <label class="control-label" for="inputWarning">商品价格</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="price" value="{{$data->price}}" />
       <span class="help-inline"></span>
      </div>
     </div>
     <!-- <div class="control-group success">
      <label class="control-label" for="inputWarning">商品库存</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="store" value="{{$data->bid}}" />
       <span class="help-inline"></span>
      </div>
     </div> -->
     <div class="control-group success">
   <label class="control-label">选择状态</label>
   <div class="controls">
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="status">
        <option value="0" >上架</option>
        <option value="1" @if($data->status ==1) selected @endif>下架</option>
    </select>
   </div>
  </div>
  <div class="control-group success">
   <label class="control-label">选择分类</label>
   <div class="controls">
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="typeid">
    @foreach($list as $value)
        <option value="{{$value->id}}" @if($data->typeid==$value->id) selected @endif>{{$value->name}}</option>
    @endforeach
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
    <div class="img"><img src="/uploads/goods/{{$data->pic}}" alt=""></div>
   </div>
  </div>
   {{ method_field('PUT') }}
   {{csrf_field()}}
     <div class="form-actions">
      <button type="submit" class="btn blue">Save</button>
      <a href="/admin/goods" class="btn">Cancel</a>
     </div>

    </form>
    <!-- END FORM-->
   </div>
  </div>

@endsection
@section("title",'修改商品');