@extends("Admin.public")
@section('main')

<script src="/static/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>

  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">添加广告</i>
    </div> 
    <div class="tools"> 
     <a href="javascript:;" class="collapse"></a> 
     <a href="#portlet-config" data-toggle="modal" class="config"></a> 
     <a href="javascript:;" class="reload"></a> 
     <a href="javascript:;" class="remove"></a> 
    </div> 
   </div> 
   <div class="portlet-body form"> 
    <h3 class="block"></h3> 
    <!-- BEGIN FORM--> 
    <form action="/adminadvent" class="form-horizontal" method="post" enctype="multipart/form-data"> 
  <div class="control-group"> 
   <label class="control-label">选择图片</label> 
   <div class="controls"> 
    <input type="file" class="default" name="pic" required /> 
   </div> 
  </div>
  <div class="control-group "> 
      <label class="control-label" for="inputWarning">网址</label> 
      <div class="controls"> 
       <input type="text" class="span6 m-wrap" id="inputWarning" name="url" value="{{old('url')}}"/> 
       <span class="help-inline"></span> 
      </div> 
     </div>  
  <div class="control-group "> 
     <label class="control-label">选择状态</label> 
     <div class="controls"> 
      <label class="radio"> 
       <div class="radio">
        <span class="checked"><input type="radio" name="status" value="0" checked /></span>
       </div>不展示</label> 
      <label class="radio"> 
       <div class="radio">
        <span class=""><input type="radio" name="status" value="1" /></span>
       </div>展示</label> 
     </div>
  </div>
   <div class="control-group"> 
   <label class="control-label">描述</label> 
   <div class="controls"> 
   <textarea cols="10" name="descr" required value="{{old('descr')}}"></textarea>
   </div> 
  </div>
     <div class="form-actions"> 
      <button type="submit" class="btn blue">添加</button> 
    
     </div> 
     {{csrf_field()}}
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
  <script>
 // alert($);

  	flag=false;
  	$('#inputWarning').blur(function(){ 
  		url=$(this).val();
  		//alert(1);
		if(url.match(/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/)){
			$(this).next().html('网址可用').css('color','green');
			flag=true;
		}else{ 
			$(this).next().html('网址不合法').css('color','red');
			flag=false;
		}
  	})
	$('.form-horizontal').submit(function(){ 
		$('#inputWarning').trigger('blur')
		if(flag==true){ 

			return true
		}else{ 
			return false
		}
	})
  </script>
@endsection
@section("title",'添加广告');