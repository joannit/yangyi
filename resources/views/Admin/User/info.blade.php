<!-- 设置标题 -->
@section('title','会员详情')
<!-- 继承公共模板 -->

@extends("Admin.public")
<!-- 设置主zhu -->
@section("main")

<html>
 <head>
  <style>
  td{font-size: 1.5em; center}
  </style>
 </head>
 <body>
  <div class="portlet box green">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-user"></i>{{$data->name}}的个人信息详情
    </div>
    <!-- <div class="tools">
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a>
    </div> -->
   </div>
   <div class="portlet-body">
    <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
     <div class="row-fluid">
      <div class="span6">

      </div>
      <div class="span5">
       <div class="dataTables_filter" id="sample_1_filter" style="margin-left:-150px">
       <form action="/admin/user" method="get">


        </form>
       </div>
      </div>
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_1" aria-describedby="sample_1_info"  >
      <thead >
       <tr role="row" >

        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 215px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 292px;">名字</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 269px;">性别</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 269px;">生日</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">注册时间</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">最后修改时间</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">图像</th>
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">

   <!-- 列表开始 -->

       <tr class="even" style="text-align:center">
        <td class="  sorting_1">{{$data->id}}</td>
        <td class=" ">{{$data->name}}</td>
        <td class="">{{$data->sex}}</td>
        <td class="">{{$data->birthday}}</td>
        <td class=" ">{{$data->created_at}}</td>
        <td class="">{{$data->updated_at}}</td>
        <td class=""><img src="{{$data->pic}}" style="height: 100px"></td>
       </tr>


       <!-- 列表结束 -->

      </tbody>
     </table>
     <div class="row-fluid">
      <div class="span6">

      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">
        <a href="/admin/user" class="btn blue">返回上一级</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection()