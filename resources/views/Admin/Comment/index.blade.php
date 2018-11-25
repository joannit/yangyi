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
     <i class="icon-globe"></i>评价列表
    </div> 
 
   </div> 
   <div class="portlet-body"> 
    <div id="sample_2_wrapper" >
     <div class="row-fluid">
      <div class="span6">
       <div id="sample_2_length" class="dataTables_length">
        <form action="/admin/comment" method="get">
        <label>商品名: <input type="text" aria-controls="sample_2" class="m-wrap small" name="keywords" value="">
        <button class="btn blue icn-only" type="submit"><i class="m-icon-swapright m-icon-white"></i></button>
        </label>
        </form>
       </div>
      </div>

     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 30px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 200px;">商品名</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">评价者</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: ;">评论内容</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width:120px ;">评论时间</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: ;">回复评价</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 70px;">操作</th>
      </tr> 
      </thead> 
      
      @foreach($list as $row)
       <tr class="odd" style="height:10px">
        <td class="">{{$row->id}}</td> 
        <td class="">{{$row->name}}</td> 
        <td class="" >{{$row->user_name}}</td>
        <td class="" >{{$row->content}}</td>
        <td class="" >{{$row->time}}</td>
        <td class="" >{!!$row->recontent!!}</td>
        @if($row->recontent =='')
        <td class="" ><a href="/admin/comment/{{$row->id}}/edit" class="btn blue">回复</a></td>
        @else
        <td class="" ><a  class="btn btn-info" disabled>已回复</a></td>
        @endif
       </tr>
      @endforeach
     </table>
     <div class="row-fluid">

      <div class="span6">
      
       <div class="dataTables_paginate paging_bootstrap pagination">

       </div>
      </div>
     </div>
    </div> 
   </div> 
  </div>
@endsection
@section("title",'评价列表')