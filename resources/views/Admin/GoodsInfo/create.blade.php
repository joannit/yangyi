@extends("Admin.public")
@section('main')
<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <div class="portlet box blue">
   <div class="portlet-title">
    <div class="caption">
     <i class="icon-reorder" style="font-size:1.5em">添加商品详情,商品名称-->>>>{{$name}}</i>
    </div>
    <!-- <div class="tools">
     <a href="javascript:;" class="collapse"></a>
     <a href="#portlet-config" data-toggle="modal" class="config"></a>
     <a href="javascript:;" class="reload"></a>
     <a href="javascript:;" class="remove"></a>
    </div> -->
   </div>
   <div class="portlet-body form">
    <h3 class="block"></h3>
    <!-- BEGIN FORM-->
    <form action="/admin/goodsinfo" class="form-horizontal" method="post" enctype="multipart/form-data">
   <!--   <div class="control-group ">
      <label class="control-label" for="inputWarning">商品名称</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="name" value="{{old('name')}}"/>
       <span class="help-inline"></span>
      </div>
     </div> -->
     <div class="control-group ">
   <label class="control-label">商品颜色</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="colorid">
        <option value="">请选择...</option>
      @foreach($color as $val)
        <option  value="{{$val->id}}" @if(old('colorid')== $val->id) selected @endif >{{$val->cname}}</option>
      @endforeach
    </select>　　
   </div>
  </div>
    <input type="hidden" name="gid" value="{{$gid}}">
     <div class="control-group ">
   <label class="control-label">商品规格</label>
   <div class="controls">
    <select class="span6 m-wrap typebb" data-placeholder="Choose a Category" tabindex="1" name="sizeid">
        <option value="">请选择...</option>
      @foreach($size as $val)
        <option  value="{{$val->id}}" @if(old('sizeid')== $val->id) selected @endif>@if($val->type==1)衣服类规格 @else鞋子类规格 @endif -->　{{$val->value}} </option>
      @endforeach
    </select>　　
   </div>
  </div>


  <div class="control-group ">
      <label class="control-label" for="inputWarning">商品库存</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="store" value="{{old('store')}}"  />
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">商品价格</label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="gprice" value="{{old('gprice')}}"  />
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">普通会员折扣<br><span style="color:blue">(100为不打折一折为10)</span></label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="discount" value="@if(old('discount')) {{old('discount')}} @else 100 @endif"  placeholder=""/>
       <span class="help-inline"></span>
      </div>
  </div>
  <div class="control-group ">
      <label class="control-label" for="inputWarning">vip折扣<br><span style="color:blue">(100为不打折一折为10)</span></label>
      <div class="controls">
       <input type="text" class="span6 m-wrap" id="inputWarning" name="udis" value="@if(old('udis')) {{old('udis')}} @else 100 @endif"  />
       <span class="help-inline"></span>
      </div>
  </div>

  <div class="control-group ">
     <label class="control-label">选择状态</label>
     <div class="controls">
      <label class="radio">
       <div class="radio">
        <span class="checked"><input type="radio" name="gstatus" value="0" checked /></span>
       </div> 上架</label>
      <label class="radio">
       <div class="radio">
        <span class=""><input type="radio" name="gstatus" value="1" /></span>
       </div> 下架 </label>
     </div>
  </div>
 <!--  <div class="control-group">
   <label class="control-label">选择图片</label>
   <div class="controls">
    <input type="file" class="default" name="pic" />
   </div>
  </div> -->
     <div class="form-actions">
      <button type="submit" class="btn blue">添加</button>
      <button type="reset" class="btn">重置</button>
     </div>

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