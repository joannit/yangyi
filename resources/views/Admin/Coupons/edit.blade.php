@extends("Admin.public")
@section('main')

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">修改优惠券</i>
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
    <form action="/coupons/{{$data->id}}" class="form-horizontal" method="post" enctype="multipart/form-data"> 
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">名称</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="pname" value="{{$data->pname}}" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
    <div class="control-group success"> 
  	<label class="control-label">选择类型</label> 
   	<div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="type"> 
        <option value="0" @if($data->type==0) selected @endif>满减</option>
        <option value="1" @if($data->type==1) selected @endif>打折</option> 
    </select> 
   </div> 
  </div>
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">优惠券面额</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="money" value="{{$data->money}}" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
  <div class="control-group "> 
      <label class="control-label" for="inputWarning">优惠券最低消费</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="lowmoney" value="{{$data->lowmoney}}" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">折扣</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="discount" value="{{$data->discount}}" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div>
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">起止时间</label> 
      <div class="input-append date" id="datetimepicker" data-date="2018-11-18" data-date-format="yyyy-mm-dd" style="margin-left:18px">
      	<input size="" type="text" value="{{$data->start_time}}" style="height:35px" name="start_time">
       	<span class="add-on"><i class="icon-th"></i></span>
	  </div>
     </div>
      <div class="control-group "> 
      <label class="control-label" for="inputWarning">过期时间</label> 
      <div class="input-append date" id="datetimepickers" data-date="2018-11-18" data-date-format="yyyy-mm-dd" style="margin-left:18px">
      	<input size="" type="text" value="{{$data->end_time}}" style="height:35px" name="end_time" required>
       	<span class="add-on"><i class="icon-th"></i></span>
	  </div>
     </div>
	<div class="control-group success"> 
  	<label class="control-label">选择状态</label> 
   	<div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="status">
        <option value="0" @if($data->status==0) selected @endif>有效</option>
        <option value="1" @if($data->status==1) selected @endif>失效</option> 
    </select> 
   </div> 
  </div>
  
     <div class="form-actions"> 
      <button type="submit" class="btn blue">修改</button> 
      
     </div> 
     {{method_field('PUT')}}
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
@endsection
@section("title",'修改优惠券');