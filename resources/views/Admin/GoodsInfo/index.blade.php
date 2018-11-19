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
     <i class="icon-globe"></i>商品詳情>>>>>{{$name}}
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

      </div>
     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info">
      <thead>

     <form action="/admin/goodsinfo/create">
       <input type="hidden" name="gid" value="{{$gid}}">
       <input type="hidden" name="name" value="{{$name}}">
       <button class="btn btn green">添加商品详情</button>
     </form>
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 50px;">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 280px;">库存</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 80px;">颜色</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">普通优惠价格</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">会员等级优惠</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">商品价格</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">商品状态</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">规格</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">操作</th>

       </tr>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @if(count($data))
      @foreach($data as $row)
       <tr class="odd">
        <td class=" ">{{$row->id}}</td>
        <td class="  sorting_1">{{$row->store}}</td>
        <td class="  sorting_1">{{$row->colorid}}</td>
        <td class="hidden-480 ">{{$row->discount}}</td>
        <td class="hidden-480 ">{{$row->udis}}</td>
        <td class="hidden-480 ">{{$row->gprice}}</td>
        <td class="hidden-480 ">{{$row->gstatus}}</td>
        <td class="hidden-480 ">{{$row->sizeid}}</td>

        <td class="hidden-480 ">

        <a href="/admin/goodsinfo/{{$row->id}}/edit" class="btn blue icn-only">修改详情信息</a>
        <form action="/admin/goodsinfo/{{$row->id}}" method="post" >
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <button class="btn red icn-only" onclick="this.disabled=true;this.parentNode.submit()" >删除</button>
        </form>


        </td>
       </tr>
       @endforeach
       @else
       <tr class="odd">
       <td colspan="9">
          <h1 style="color:red">該商品暫未加詳情</h1>
          </td
       </tr>
       @endif
      </tbody>
     </table>
     <div class="row-fluid">
      <div class="span6">
       <div class="dataTables_info" id="sample_2_info">

       </div>
      </div>
      <div class="span6">
       <div class="dataTables_paginate paging_bootstrap pagination">


       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
@endsection
@section("title",'商品列表')