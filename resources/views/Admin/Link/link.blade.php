@extends("AdminPublic.public")
@section('main')
<html>
 <head>
 	 <script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="portlet box light-grey"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-globe"></i>友情链接列表
    </div> 
    <div class="tools"> 
     <a href="javascript:;" class="collapse"></a> 
     <a href="#portlet-config" data-toggle="modal" class="config"></a> 
     <a href="javascript:;" class="reload"></a> 
     <a href="javascript:;" class="remove"></a> 
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
      <form action="/adminuser" method="get">
       <div class="dataTables_filter" id="sample_1_filter">
        <label>链接名:<input type="text" aria-controls="sample_1" class="m-wrap medium" name="keywords" value="{{$request['keywords'] or ''}}"/>
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
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">链接名</th>
       <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">网址</th>
        <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;">描述</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 103px;">状态</th>
        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 156px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      
      <!--开始遍历数据 -->
       @foreach($data as $row)
       <tr class="gradeX odd"> 
        <td class=" " style="line-height:60px">{{$row->id}}</td>
       	<td class=" " style="line-height:60px">{{$row->linkname}}</td>
       	<td class=" " style="line-height:60px">{{$row->url}}</td>
       	<td class=" " style="line-height:60px">{{$row->descr}}</td>
        <td class=" " id="" style="line-height:60px"><button  class="btn btn green status">{{$row->status==0?'待审核':'审核通过'}}</button></td>
        <td >
        <form action="" method="post" style="height:15px">
        <button class="btn btn red" style="">删除</button>
        </form>   	
        <a href="" class="btn btn yellow">修改</a>       
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
     	{{csrfrender()}}
        </ul>
       </div>
      </div>
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
<script>
</script>
@endsection()
@section('title','友情链接列表')