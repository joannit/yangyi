@extends("Admin.public")
@section('main')
<html>
 <head></head>
 <body>
  <div class="portlet-body"> 
   <div class="clearfix"> 
    <div class="btn-group"> 
      <br>
     <a href="/adminimages/create" class="btn green info">添加广告 <i class="icon-plus"></i></a>
    </div> 

   </div> 
   <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <div class="row-fluid">
     <div class="span6">
      <div id="sample_1_length" class="dataTables_length">
       <label><select size="1" name="sample_1_length" aria-controls="sample_1" class="m-wrap small"><option value="5" selected="selected">5</option><option value="15">15</option><option value="20">20</option><option value="-1">所有</option></select><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 每页记录</font></font></label>
      </div>
     </div>
     <div class="span6">

     <form action="/adminimages" method="get">
      <div class="dataTables_filter" id="sample_1_filter">
       <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索：
        </font></font><input type="text" aria-controls="sample_1" class="m-wrap medium" name="keywords"/>
       <input type="submit" value="搜索">
     </label>
       
      </div>
      </form>

     </div>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info"> 
     <thead> 
      <tr role="row">
       <th style="width: 24px;" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
        <div class="checker">
         <span><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></span>
        </div></th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 153px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
       <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Email" style="width: 275px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></th>
       <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Joined" style="width: 162px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></th>
       <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Joined" style="width: 162px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
       
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
    @foreach($data as $row)
      <tr class="gradeX odd"> 
       <td class="  sorting_1">
        <div class="checker">
         <span><input type="checkbox" class="checkboxes" value="1" /></span>
        </div></td> 
       <td class=" "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$row->id}}</font></font></td> 
       <td class=" "><img width="60px" height="50px" src="/uploads/{{$row->pic}}"></td> 

        <td>
        @if($row->status ==1)
        <img src="/static/admin/image/dui.png" width="20">
        @else
        <img src="/static/admin/image/cuo.png" width="20">
        @endif
        </td>
        <form action="/adminimages/{{$row->id}}" method="post">
        <td class=" "><button class="btn red">删除</button>|<a href="/adminimages/{{$row->id}}/edit" method="put" class="btn green">修改</a></td>
        {{CSRF_FIELD()}}
        {{ method_field('DELETE') }}

        </form>
      </tr>

    @endforeach()
     </tbody>
    </table>
    <div class="row-fluid">
     <div class="span6">
      <div class="dataTables_info" id="sample_1_info">
       <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示所有数据中的1到5个</font></font>
      </div>
     </div>
     <div class="span6">
      <div class="dataTables_paginate paging_bootstrap pagination">
       <ul>
        {{$data->appends($request)->render()}} 
       </ul>
      </div>
     </div>
    </div>
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','轮播图')