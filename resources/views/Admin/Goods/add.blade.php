@extends("Admin.public")
@section('main')
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder">添加商品</i>

    </div>
    <div class="tools">
     <a href="javascript:;" class="collapse"></a>
     <a href="#portlet-config" data-toggle="modal" class="config"></a>
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a>
    </div>
   </div>


<!--    <div class="portlet-body form">
    <h3 class="block"></h3>

    <form action="/admin/goods" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group ">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/>
       <span class="help-inline"></span>
      </div>
     </div> -->
 <!--     <div class="control-group ">
   <label class="control-label">选择分类</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="typeid">

    </div>

   </div> -->
   <div class="portlet-body form">
    <h3 class="block"></h3>
    <!-- BEGIN FORM-->
    <form action="/admin/goods" class="form-horizontal" method="post" enctype="multipart/form-data">
     <div class="control-group ">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/>
       <span class="help-inline"></span>
      </div>
     </div>
     <div class="control-group ">
   <label class="control-label">选择分类</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="typeid">

        <option value="">请选择...</option>
        @foreach($list as $row)
        <option  value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
    </select>　　<span><span id="brand" style="font-size:1.2em;">选择品牌(先选择分类)</span></span>


   </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">商品价格</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="price" value="{{old('price')}}"/>
       <span class="help-inline"></span>
      </div>
     </div>
 <!--     <div class="control-group ">
      <label class="control-label" for="inputWarning">商品库存</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="store" value="{{old('store')}}" />
       <span class="help-inline"></span>
      </div>
  </div> -->
  <div class="control-group ">
     <label class="control-label">选择状态</label>
     <div class="controls">
      <label class="radio">
       <div class="radio">
        <span class="checked"><input type="radio" name="status" value="0" checked /></span>
       </div> 上架</label>
      <label class="radio">
       <div class="radio">
        <span class=""><input type="radio" name="status" value="1" /></span>
       </div> 下架 </label>
     </div>
  </div>
  <div class="control-group">
   <label class="control-label">选择图片</label>
   <div class="controls">
    <input type="file" class="default" name="pic" />
   </div>
  </div>

     <div class="form-actions">
      <button type="submit" class="btn blue">Save</button>
      <button type="reset" class="btn">Cancel</button>
     </div>


    <!--  <div class="form-actions">
      <button type="submit" class="btn blue">Save</button>
      <button type="reset" class="btn">Cancel</button>
     </div> -->

     {{csrf_field()}}
    </form>
    <!-- END FORM-->

   </div>
  </div>

  <script>

    $('.typebb').change(function(){
      tid=$(this).val();
      good=$(this);
        if(document.getElementById('bbb'))
            {
              $('#bbb').remove();
            }
        if(document.getElementById('createbb'))
            {
              $('#createbb').remove();
            }
      // console.log($('.typebb'));
      if (tid) {



        $.get('/admin/typebrand',{tid:tid},function(data){

          if(data.length)  {
             // if(document.getElementById('bbb'))
            // {
              // remove($('#bbb').parent().son());
            // }
              // 选择品牌显示
              $('#brand').html('品牌').after('<select name="bid" id="bbb"><option value=""  >选择品牌</option></select>');

              $.each(data,function(k,brand){
                  // console.log(brand);
                $('#bbb').append('<option value="'+brand.id+'" >'+brand.name+'</option>');
              });


          } else {
            // alert(2);
            // remove( $('#createbb'));
             $('#brand').html('<br>该类下未添加品牌').after('<form id="createbb" action="/admin/brand/create" method="get"></form>');
             $('#createbb').append('<input type="hidden" name="id" value="'+tid+'"> <button class="btn btn green" float="left">添加品牌</button>')

          }

        });
      }
    });

  </script>
@endsection
@section("title",'添加商品');