<!-- 设置标题 -->
@section('title','管理员管理')
<!-- 继承公共模板 -->

@extends("Admin.public")
<!-- 设置主zhu -->
@section("main")

<html>
 <head>

 </head>
 <body>
  <div class="portlet box green">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-user"></i>管理员列表
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
       <form action="/admin/master" method="get">
        <label><b>用户名:</b> <input type="text" aria-controls="sample_1" class="m-wrap small"  name="admin_name" value="{{$admin_name or ''}}" />
        　<input type="submit"  value="搜索" class="btn blue" /></label>

        </form>
       </div>
      </div>
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_1" aria-describedby="sample_1_info"  >
      <thead >
       <tr role="row" >

        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 215px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 292px;">NAME</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 292px;">手机号</th>

        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 184px;">状态</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 184px;">管理员等级</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">添加时间</th>

         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">操作</th>
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">

   <!-- 列表开始 -->
      @if(count($data)!=0)
      @foreach($data as $row)
       <tr class="even">

        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->admin_name}}</td>
        <td class=" ">{{$row->admin_phone}}</td>
        <td class="hidden-480 "> @if($row->admin_status ==1) 激活 @else 禁用@endif</td>

        <td class="hidden-480 ">{{$row->rname}}</td>
        <td class="hidden-480 ">{{$row->created_at}}</td>

        <td class="hidden-480">

        <a href="/admin/master/{{$row->id}}/edit" class="btn blue">修改状态或者管理等级</a>
        <a href="/adminpower/{{$row->id}}/edit" class="btn green">分配权限</a>
        <form action="/admin/master/{{$row->id}}" method="post">
          <button onclick="this.disabled=true;this.parentNode.submit()" class="btn btn red">删除</button>
          {{csrf_field()}}
          {{method_field('DELETE')}}
        </form>

        </td>

       </tr>
      @endforeach
    <tr class="even">
    @else


        <td class="hidden-480" colspan="7"  style="text-align:center;color:red"><h1>暂无数据</h1></td>

       </tr>
  @endif

       <!-- 列表结束 -->

      </tbody>
     </table>
     <div class="row-fluid">
      <div class="span6">

      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">



       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection()