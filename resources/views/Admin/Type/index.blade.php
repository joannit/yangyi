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
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-globe"></i>分类列表
    </div>
    <div class="actions">
     <div class="btn-group">
      <a class="btn" href="#" data-toggle="dropdown"> Columns <i class="icon-angle-down"></i> </a>
      <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
       <label>
        <div class="checker">
         <span class="checked"><input type="checkbox" checked="" data-column="0" /></span>
        </div>Rendering engine</label>
       <label>
        <div class="checker">
         <span class="checked"><input type="checkbox" checked="" data-column="1" /></span>
        </div>Browser</label>
       <label>
        <div class="checker">
         <span class="checked"><input type="checkbox" checked="" data-column="2" /></span>
        </div>Platform(s)</label>
       <label>
        <div class="checker">
         <span class="checked"><input type="checkbox" checked="" data-column="3" /></span>
        </div>Engine version</label>
       <label>
        <div class="checker">
         <span class="checked"><input type="checkbox" checked="" data-column="4" /></span>
        </div>CSS grade</label>
      </div>
     </div>
    </div>
   </div>
   <div class="portlet-body">
    <div id="sample_2_wrapper" class="dataTables_wrapper form-inline" role="grid">
     <div class="row-fluid">
      <div class="span6">
       <div id="sample_2_length" class="dataTables_length">
        <label>
         <div class="select2-container m-wrap small" id="s2id_autogen3">
          <a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1"> <span>5</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>
           <div>
            <b></b>
           </div></a>
          <input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4" />
          <div class="select2-drop select2-with-searchbox" style="display:none">
           <div class="select2-search">
            <input type="text" autocomplete="off" class="select2-input" />
           </div>
           <ul class="select2-results">
           </ul>
          </div>
         </div><select size="1" name="sample_2_length" aria-controls="sample_2" class="m-wrap small select2-offscreen" tabindex="-1"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records per page</label>
       </div>
      </div>
      <div class="span6">
       <div class="dataTables_filter" id="sample_2_filter">
       <form action="/admin/type" method="get">
        <label>搜索: <input type="text" aria-controls="sample_2" class="m-wrap small" name="keywords" value="{{$request['keywords'] or ''}}"/>
        <button class="btn blue icn-only" type="submit"><i class="m-icon-swapright m-icon-white"></i></button>
        </label>
        </form>
       </div>
      </div>
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info">
      <thead>
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 192px;">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 261px;">NAME</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">PID</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">PATH</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 165px;">ACTION</th>

       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($type as $row)
       <tr class="odd" style="height:10px">
        <td class=" ">{{$row->id}}</td>
        <td class="  sorting_1">{{$row->name}}</td>
        <td class=" ">{{$row->pid}}</td>
        <td class="">{{$row->path}}</td>
        <td class="" width="180">
        <ul>
        <li class="fl">
        <a href="/admin/type/{{$row->id}}/edit" class="btn blue"><i class="icon-pencil"></i>修改</a>
        </li>
        <li class="fl">
        <form action="/admin/type/{{$row->id}}" method="post">
        {{csrf_field()}}
        {{method_field("DELETE")}}
        <button class="btn red icn-only" onclick="this.disabled=true;this.parentNode.submit()">删除</button>

        </li>
        <li class="fl">
        <a href="/admin/brand/{{$row->id}}" class="btn green"><i class="icon-pencil"></i>品牌</a>
        </li>
        <div class="cl"></div>
        </ul>

       </tr>
       </form>
       @endforeach
      </tbody>
     </table>
     <div class="row-fluid">
      <div class="span6">
       <div class="dataTables_info" id="sample_2_info">

       </div>
      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">
sdasd
         {{$type->appends($request)->render()}}

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
@endsection
@section("title",'分类列表')