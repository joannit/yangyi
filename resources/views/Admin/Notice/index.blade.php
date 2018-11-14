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
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script> 
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-globe"></i>公告列表
    </div> 
 
   </div> 
   <div class="portlet-body"> 
    <div id="sample_2_wrapper" >
     <div class="row-fluid">
      <div class="span6">
       <div id="sample_2_length" class="dataTables_length">
        <label>
         
    <div class="btn-group"> 
   <a href="/admin/notice/create" class="btn green" >添加公告 <i class="icon-plus"></i> </a> 
    </div>
       </div>
      </div>

     </div>
     <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_2" aria-describedby="sample_2_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 50px;">Delete</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 50px;">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Browser: activate to sort column descending" style="width: 261px;">标题</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: ;">内容</th>
        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">操作</th>
       </tr> 
      </thead> 
      
      @foreach($list as $row)
       <tr class="odd" style="height:10px">
       <td><p><input type="checkbox" value="{{$row->id}}"><p></td> 
        <td class="">{{$row->id}}</td> 
        <td class="  sorting_1">{{$row->title}}</td> 
        <td class="" width="">{!!$row->content!!}</td>
        <td class="" width="">
        <ul>
        <li class="fl">
        <a href="/admin/notice/{{$row->id}}/edit" class="btn blue"><i class="icon-pencil"></i> Edit</a>
        </li>
        <li class="fl">
        <form action="/admin/notice/{{$row->id}}" method="post">
        {{csrf_field()}}
        {{method_field("DELETE")}}
        <button class="btn red icn-only">Dlete</button> 
        </form>
        </li>
        <div class="cl"></div>
        </ul>
        </td> 
       </tr>
       @endforeach
      
     </table>
     <div class="row-fluid">
      <div class="span6">
       <div class="dataTables_info" id="sample_2_info">
        <a href="javascript:void(0)" class="btn blue icn-only all">全选</a>
        <a href="javascript:void(0)"  class="btn  icn-only fx">反选</a><br><br>
        <a href="javascript:void(0)"  class="btn red icn-only del">删除</a>
       </div>
      </div>
      <div class="span6">

       <div class="dataTables_paginate paging_bootstrap pagination">
       {{$list->appends($request)->render()}}
       </div>
      </div>
     </div>
    </div> 
   </div> 
  </div>
<script type="text/javascript">

// 全选
  $('.all').click(function(){
    // 遍历所有tr
    $("#sample_2").find("tr").each(function(){
      $(this).find(":checkbox").attr("checked",true);
    })
  });
//反选
 $(".fx").click(function(){
  $("#sample_2").find("tr").each(function(){
    //判断
    if($(this).find(":checkbox").attr("checked")){
      //取消选中
      $(this).find(":checkbox").attr("checked",false);
    }else{
      $(this).find(":checkbox").attr("checked",true);
    }
  });
 }); 
// 删除
$('.del').click(function(){
  arr=[];
  //遍历
  $(":checkbox").each(function(){
    if($(this).attr("checked")){
      //获取选中数据的id
      id=$(this).val();
      arr.push(id);
      // alert(id);
    }
  });
  $.get('/noticedel',{arr:arr},function(data){
    
    if(data==1){
      //遍历arr数组
      for(var i=0;i<arr.length;i++){
        //获取选中数据input
        $("input[value='"+arr[i]+"']").parents("tr").remove();
      }
    }else{
        alert(data);
      }
    
  })
}) 
</script>
@endsection
@section("title",'公告列表')