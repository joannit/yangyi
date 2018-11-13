<!-- 设置标题 -->
@section('title','会员管理')
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
     <i class="icon-user"></i>会员列表
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
     <!--   <div id="sample_1_length" class="dataTables_length">
        <label>
         <div class="select2-container m-wrap small" id="s2id_autogen1">
          <a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1"> <span>5</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>
           <div>
            <b></b>
           </div></a>
          <input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2" />
          <div class="select2-drop select2-with-searchbox" style="display:none">
           <div class="select2-search">
            <input type="text" autocomplete="off" class="select2-input" />
           </div>
           <ul class="select2-results">
           </ul>
          </div>
         </div><select size="1" name="sample_1_length" aria-controls="sample_1" class="m-wrap small select2-offscreen" tabindex="-1"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records per page</label>
       </div> -->
      </div>
      <div class="span5">
       <div class="dataTables_filter" id="sample_1_filter" style="margin-left:-150px">
       <form action="/admin/user" method="get">
        <label><b>用户名:</b> <input type="text" aria-controls="sample_1" class="m-wrap small"  name="user_name" value="{{$user_name or ''}}" /><b>状态(1 代表激活, 0 代表禁用):</b> <input type="text" aria-controls="sample_1" class="m-wrap small"  name="user_status" value="{{$user_status  or ''}}" />
        　<input type="submit"  value="搜索" class="btn blue" /></label>

        </form>
       </div>
      </div>
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_1" aria-describedby="sample_1_info"  >
      <thead >
       <tr role="row" >

        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 215px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 292px;">名字</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 269px;">手机号</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 184px;">状态</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">会员级别</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">注册时间</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">最后修改时间</th>
         <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 134px;">操作</th>
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">

   <!-- 列表开始 -->
    @if(count($data))
   @foreach($data as $row)
       <tr class="even">

        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->user_name}}</td>
        <td class="hidden-480 ">{{$row->user_phone}}</td>
        <td class="hidden-480 ">
        @if ($row->user_status==1)
            激活
        @else
            禁用
        @endif
        </td>
        <td class="hidden-480 ">
        @if ($row->user_level==0)
        普通用户
        @elseif ($row->user_level==1)
        银牌用户
        @elseif ($row->user_level==2)
        超级会员
        @else
        vip
        @endif
        </td>
        <td class="hidden-480 ">{{$row->created_at}}</td>
        <td class="hidden-480 ">{{$row->updated_at}}</td>
        <td class="hidden-480">
        <a href="/admin/user/{{$row->id}}/edit" class="btn btn green">修改</a>
        <a href="/admin/user/{{$row->id}}" class="btn yellow">会员详情</a>
        <form action="/admin/user/{{$row->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
      <button class="btn btn red">删除</button>
        </form>
        </td>

       </tr>
    @endforeach
    @else

    <tr class="even">



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

         {{$data->appends($request)->render()}}

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection()