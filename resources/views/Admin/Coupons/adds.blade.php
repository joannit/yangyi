@extends("Admin.public")
@section('main')
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">分配优惠券</i>
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
    <form action="/couponsuser" class="form-horizontal" method="post" enctype="multipart/form-data"> 
    <div class="control-group "> 
      <label class="control-label" for="inputWarning">用户</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="user_name" value="" required/> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
    <div class="control-group success"> 
  	<label class="control-label">选择优惠券</label> 
   	<div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="pname"> 
    @foreach($data as $row)
        <option value="{{$row->id}}">{{$row->pname}}</option>
    @endforeach()
    </select> 
   </div> 
    <div class="form-actions"> 
     <button type="submit" class="btn blue">分配</button> 
      
     </div> 
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
@endsection
@section("title",'分配优惠券');