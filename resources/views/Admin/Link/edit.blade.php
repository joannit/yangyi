@extends("Admin.public")
@section('main')

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">修改链接</i>
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
    <form action="/admin/link/{{$data->id}}" class="form-horizontal" method="post"> 
     <div class="control-group success
"> 
      <label class="control-label" for="inputWarning">连接名</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="linkname" value="{{$data->linkname}}" disabled /> 
       <span class="help-inline"></span> 
      </div> 
     </div> 

      <div class="control-group success
"> 
      <label class="control-label" for="inputWarning">网址</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="url" value="{{$data->url}}" disabled /> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
      <div class="control-group success
"> 
      <label class="control-label" for="inputWarning">描述</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="descr" value="{{$data->descr}}" disabled /> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <div class="control-group success
"> 
   <label class="control-label">状态</label> 
   <div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="status">
       <option value="0" @if($data->status==0) selected @endif>待审核</option> 
       <option value="1" @if($data->status==1) selected @endif >审核通过</option> 
        <option value="2" @if($data->status==2) selected @endif >审核未通过</option> 
    </select> 
    {{ method_field('PUT') }}
   </div> 
  </div>
     <div class="form-actions"> 
      <button type="submit" class="btn blue">Save</button> 
      <button type="button" class="btn">Cancel</button> 
     </div> 
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>

@endsection
@section("title",'修改链接');