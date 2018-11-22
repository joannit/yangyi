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
     <i class="icon-globe"></i>订单列表
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
      <div class="span6">
       <div class="dataTables_filter" id="sample_2_filter">
       <form action="/admin/order" method="get">
        <label>订单号: <input type="text" aria-controls="sample_2" class="m-wrap small" name="keywords" value="{{$request['keywords'] or ''}}"/>
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
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 80px;">订单号</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 70px;">会员名</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">付款金额</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">付款时间</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">完成时间</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width:50px ;">收货人</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width:100px ;">地址</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width:80px ;">电话</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: px;">操作</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: px;">详情</th>
       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($order as $list)
       <tr class="odd">
        <td class=" ">{{$list->id}}</td>
        <td class=" ">{{$list->ordernum}}</td>
        <td class="  sorting_1">{{$list->user_name}}</td>
        <td class="hidden-480 ">&yen;{{$list->pay}}</td>
        <td class="hidden-480 ">{{$list->paytime}}</td>
        <td class="hidden-480 ">{{$list->c_time}}</td>
        <td class="hidden-480 ">{{$list->aname}}</td>
        <td class="hidden-480 ">{{$list->address}}</td>
        <td class="hidden-480 ">{{$list->aphone}}</td>
        <td class="hidden-480 ">
          @if($list->ostatus==1)
            待付款
          @elseif($list->ostatus==2)
          <a href="/admin/order/{{$list->id}}/edit" class="btn green">点击发货</a>
          @elseif($list->ostatus==3)
          待收货
          @elseif($list->ostatus==4)
          交易完成
          @elseif($list->ostatus==5)
          <a href="" class="btn">查看评价</a>
          @endif
        </td>
        <td class="hidden-480 "><a href="/admin/order/{{$list->id}}" class="btn icn-only"><i class="icon-zoom-in"></i></a></td>
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
        {{$order->appends($request)->render()}}
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
@endsection
@section("title",'订单列表')