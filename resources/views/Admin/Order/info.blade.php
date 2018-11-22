@extends("Admin.public")
@section("main")
<style>
    /*.fl{list-style-type: none;};*/
    /*.cl{clear: left}*/
    .table th, .table td {
    text-align: center;
    vertical-align: middle!important;
    }
    .img{height: 60px;width: 40px;margin: 0px auto}
</style>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-globe"></i>订单详情
    </div>
    <div class="actions">
     <div class="btn-group">
      <!-- <a class="btn" href="#" data-toggle="dropdown"> Columns <i class="icon-angle-down"></i> </a> -->
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

       </div>
      </div>

     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info">
      <thead>
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 30px;">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 50px;">订单号</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 150px;">商品名称</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 100px;">商品图片</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">规格</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 50px;">单价</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 30px;">数量</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 50px;">小计</th>
        
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
     @foreach($info as $list)
       <tr class="odd">
        <td class=" ">{{$list->id}}</td>
        <td class=" ">{{$list->ordernum}}</td>
        <td class="  sorting_1">{{$list->name}}</td>
        <td class="hidden-480 ">
          <img src="/uploads/goods/{{$list->pic}}" style="height: 130px">
        </td> 
        <td class="hidden-480 ">{{$list->cname}}<br>{{$list->value}}</td> 
        <td class="hidden-480 ">&yen;{{$list->gprice}}</td>
        <td class="hidden-480 ">{{$list->num}}</td>
        <td class="hidden-480 ">&yen;{{$list->count}}</td>

       </tr>
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
        <a href="/admin/order" class="btn blue" >返回上一级</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
@endsection
@section("title",'订单详情')