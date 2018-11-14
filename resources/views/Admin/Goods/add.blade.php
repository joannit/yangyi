@extends("Admin.public")
@section('main')

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">添加商品</i>
    </div> 

   </div> 
   <div class="portlet-body form"> 
    <h3 class="block"></h3> 
    <!-- BEGIN FORM--> 
    <form action="/admin/goods" class="form-horizontal" method="post" enctype="multipart/form-data"> 
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">商品名称</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <div class="control-group "> 
   <label class="control-label">选择分类</label> 
   <div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="typeid"> 
        <option value="">请选择...</option>
        @foreach($list as $row) 
        <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach
    </select> 
   </div> 
  </div>
  <div class="control-group "> 
      <label class="control-label" for="inputWarning">商品价格</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="price" value="{{old('price')}}"/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">商品库存</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="store" value="{{old('store')}}" /> 
       <span class="help-inline"></span> 
      </div> 
  </div> 
  <div class="control-group "> 
     <label class="control-label">选择状态</label> 
     <div class="controls"> 
      <label class="radio"> 
       <div class="radio">
        <span class="checked"><input type="radio" name="status" value="0" checked /></span>
       </div> 上架</label> 
      <label class="radio"> 
       <div class="radio">
        <span class=""><input type="radio" name="status" value="1" /></span>
       </div> 下架 </label> 
     </div>
  </div>
  <div class="control-group"> 
   <label class="control-label">选择图片</label> 
   <div class="controls"> 
    <input type="file" class="default" name="pic" /> 
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