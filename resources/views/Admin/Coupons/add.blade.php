@extends("Admin.public")
@section('main')
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">添加优惠券</i>
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
    <form action="/coupons" class="form-horizontal" method="post" enctype="multipart/form-data"> 
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">名称</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="pname" value="" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
    <div class="control-group success"> 
  	<label class="control-label">选择类型</label> 
   	<div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="type"> 
        <option value="0">满减</option>
        <option value="1">打折</option> 
    </select> 
   </div> 
  </div>
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">优惠券面额</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="money" value="" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
  <div class="control-group "> 
      <label class="control-label" for="inputWarning">优惠券最低消费</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="lowmoney" value="" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">折扣</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="discount" value="" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div>
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">起止时间</label> 
      <div class="input-append date" id="datetimepicker" data-date="2018-11-18" data-date-format="yyyy-mm-dd" style="margin-left:18px">
      	<input size="" type="text" value="" style="height:35px" name="start_time">
       	<span class="add-on"><i class="icon-th"></i></span>
	  </div>
     </div>
      <div class="control-group "> 
      <label class="control-label" for="inputWarning">过期时间</label> 
      <div class="input-append date" id="datetimepickers" data-date="2018-11-18" data-date-format="yyyy-mm-dd" style="margin-left:18px">
      	<input size="" type="text" value="" style="height:35px" name="end_time" required>
       	<span class="add-on"><i class="icon-th"></i></span>
	  </div>
     </div>
	<div class="control-group success"> 
  	<label class="control-label">选择状态</label> 
   	<div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="status">
        <option value="0">有效</option>
        <option value="1">失效</option> 
    </select> 
   </div> 
  </div>
  
     <div class="form-actions"> 
      <button type="submit" class="btn blue">添加</button> 
      
     </div> 
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
@endsection
@section("title",'添加优惠券');