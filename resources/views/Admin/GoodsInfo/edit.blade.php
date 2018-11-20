@extends("Admin.public")
@section('main')
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder" style="font-size:1.5em">修改商品信息,商品名称-->>>>{{$name}}</i>
    </div>
    <!-- <div class="tools">
     <a href="javascript:;" class="collapse"></a>
     <a href="#portlet-config" data-toggle="modal" class="config"></a>
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a>
    </div> -->
   </div>
   <div class="portlet-body form">
    <h3 class="block"></h3>
    <!-- BEGIN FORM-->
    <form action="/admin/goodsinfo/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
   <!--   <div class="control-group ">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/>
       <span class="help-inline"></span>
      </div>
     </div> -->
     <div class="control-group ">
   <label class="control-label">商品颜色</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="colorid">
        <option value="">请选择...</option>
      @foreach($color as $val)
        <option  value="{{$val->id}}" @if($data->colorid == $val->id) selected @endif >{{$val->cname}}</option>
      @endforeach
    </select>　　
   </div>
  </div>

     <div class="control-group ">
   <label class="control-label">商品规格</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="sizeid">
        <option value="">请选择...</option>
      @foreach($size as $val)
        <option  value="{{$val->id}}" @if($data->sizeid == $val->id) selected @endif>@if($val->type==1)衣服类规格 @else鞋子类规格 @endif -->　{{$val->value}} </option>
      @endforeach
    </select>　　
   </div>
  </div>


  <div class="control-group ">
      <label class="control-label" for="inputWarning">商品库存</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="store" value="{{$data->store}}"  />
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">商品价格</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="gprice" value="{{$data->gprice}}"  />
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">普通会员折扣<br><span style="color:blue">(100为不打折一折为10)</span></label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="discount" value="{{$data->discount}}"  placeholder=""/>
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">vip折扣<br><span style="color:blue">(100为不打折一折为10)</span></label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="udis" value="{{$data->udis}}"  />
       <span class="help-inline"></span>
      </div>
  </div>

  <div class="control-group ">
     <label class="control-label">选择状态</label>
     <div class="controls">
      <label class="radio">
       <div class="radio">
        <span class="checked"><input type="radio" name="gstatus" value="0" @if($data->gstatus==0) checked @endif /></span>
       </div> 上架</label>
      <label class="radio">
       <div class="radio">
        <span class=""><input type="radio" name="gstatus" value="1" @if($data->gstatus==1) checked @endif /></span>
       </div> 下架 </label>
     </div>
  </div>

     <div class="form-actions">
      <button type="submit" class="btn blue">添加</button>
      <button type="reset" class="btn">重置</button>
     </div>

     {{csrf_field()}}
     {{method_field('PUT')}}
    </form>
    <!-- END FORM-->

   </div>
  </div>


@endsection
@section("title",'修改商品信息');