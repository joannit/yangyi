@extends("Admin.public")
@section("main")
<style>
    .fl{list-style-type: none;float: left};
    .cl{clear: left}
    .table th, .table td { 
    text-align: center;
    vertical-align: middle!important;
    }

</style>
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script> 
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-globe"></i>站内信列表
    </div> 
 
   </div> 
   <div class="portlet-body"> 
    <div id="sample_2_wrapper" >
     <div class="row-fluid">
      <div class="span6">

    <div class="btn-group"> 
   <a href="/admin/message/create" class="btn green" >发送消息 <i class="icon-plus"></i> </a> 
    </div>
       </div>
       <div class="span6">
        
        <form action="/admin/message" method="get">
        <label style="text-align:right">接收人: <input type="text" aria-controls="sample_2" class="m-wrap small" name="keywords" value="" align="right">
        <button class="btn blue icn-only" type="submit"><i class="m-icon-swapright m-icon-white"></i></button>
        </label>
        </form>
       </div>  
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 30px;">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 70px;">接收人</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: ;">内容</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width:150px ;">发送时间</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 60px;">操作</th>
       </tr> 
      </thead> 
      
      @foreach($list as $row)
       <tr class="odd" style="height:10px">
        <td class="">{{$row->id}}</td> 
        <td class="  sorting_1">{{$row->user_name}}</td> 
        <td class="" width="">{!!$row->content!!}</td>
        <td class="" width="">{{date('Y-m-d H:i',$row->time)}}</td>
        <td class="" width=""> 
        <form action="/admin/message/{{$row->id}}" method="post">
        {{csrf_field()}}
        {{method_field("DELETE")}}
        <button class="btn red icn-only">Dlete</button> 
        </form> 
        </td> 
       </tr>
       @endforeach
     </table>
     <div class="row-fluid">
      <div class="span6">
      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">
        {{$list->appends($request)->render()}}
       </div>
      </div>
     </div>
    </div> 
   </div> 
  </div>

@endsection
@section("title",'站内信列表')