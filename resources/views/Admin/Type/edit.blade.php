@extends("Admin.public")
@section('main')

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">修改商品分类</i>
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
    <form action="/admin/type/{{$data->id}}" class="form-horizontal" method="post"> 
     <div class="control-group success
"> 
      <label class="control-label" for="inputWarning">分类名称</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{$data->name}}" /> 
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <div class="control-group success
"> 
   <label class="control-label">选择父类</label> 
   <div class="controls"> 
    <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="pid"> 
        <option value="0">请选择...</option> 
        @foreach($list as $value)
        @if ($value->id == $data->pid)
        <option value="{{$value->id}}" selected 
         >{{$value->name}}</option>
        @else
        <option value="{{$value->id}}"
         >{{$value->name}}</option>
         @endif
        @endforeach
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
@section("title",'修改分类');