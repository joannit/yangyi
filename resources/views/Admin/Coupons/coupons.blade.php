@extends("Admin.public")
@section('main')
<html>
 <head>
 	 <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="portlet box light-grey">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-globe"></i>优惠券列表
    </div>
    <div class="tools">
    <!--  <a href="javascript:;" class="collapse"></a>
     <a href="#portlet-config" data-toggle="modal" class="config"></a>
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a> -->
    </div>
   </div>
   <div class="portlet-body">
    <div class="clearfix">
     <div class="btn-group">

     </div>

    </div>
    <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
     <div class="row-fluid">
      <div class="span6">
       <div id="sample_1_length" class="dataTables_length">

       </div>
      </div>
      <div class="span6">
      <form action="/coupons" method="get">
       <div class="dataTables_filter" id="sample_1_filter">
        <label>类型:<input type="text" aria-controls="sample_1" class="m-wrap medium" name="keywords" value="{{$request['keywords'] or ''}}"/>
      <button type="submit" class="btn btn green">搜索</button>
        </label>
       </div>
       </form>
      </div>
     </div>
     <table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info">
      <thead>
       <tr role="row">

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 153px;">ID</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">名称</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">类型</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">优惠券金额</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">最低消费</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">起止时间</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">过期时间</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">折扣</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 103px;">状态</th>
        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 156px;">操作</th>
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $row)
      <!--开始遍历数据 -->
       <tr class="gradeX odd">
        <td class=" " style="line-height:60px">{{$row->id}}</td>
        <td class=" " style="line-height:60px">{{$row->pname}}</td>
       	<td class=" " style="line-height:60px">{{$row->type==0?'满减':'打折'}}</td>
       	<td class=" " style="line-height:60px">{{$row->money}}</td>
       	<td class=" " style="line-height:60px">{{$row->lowmoney}}</td>
       	<td class=" " style="line-height:60px">{{$row->start_time}}</td>
       	<td class=" " style="line-height:60px" id="end_time">{{$row->end_time}}</td>
       	<td class=" " style="line-height:60px">{{$row->discount}}折</td>
        <td class=" " id="" style="line-height:60px"><button  class="btn btn green status">
        @if($row->status==0)
        有效
        @elseif($row->status==1)
        失效
        @endif
        </button></td>
        <td >
        <form action="/coupons/{{$row->id}}" method="post" style="height:15px">
        <button class="btn btn red" style="" onclick="this.disabled=true;this.parentNode.submit()">删除</button>
        {{method_field('DELETE')}}
        {{csrf_field()}}
        </form>
        <a href="/coupons/{{$row->id}}/edit" class="btn btn yellow">修改</a>
        </td>
       </tr>

       @endforeach()
       <!-- 遍历结束-->
      </tbody>
     </table>
     <div class="row-fluid">
      <div class="span6">
       <div class="dataTables_info" id="sample_1_info">

       </div>
      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">

        <ul>
         <!-- 分页-->
     	{{$data->appends($request)->render()}}
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
<script>
	//time=$('#end_time').html();
	//id=$('#end_time').parents.find('tr td:first').html();
	//alert(id);
	//alert(time);
	//$.get('/times',{time:time},function(){
		//alert(data);
	//})
</script>
</html>

@endsection()
@section('title','优惠券列表')