@extends("Admin.public")
@section('main')
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/static/admin/js/jquery-1.10.1.min.js"></script>
  <div class="portlet box blue"> 
   <div class="portlet-title"> 
    <div class="caption">
     <i class="icon-reorder">发送消息</i>
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
    <form action="/admin/message" class="form-horizontal" method="post"> 
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">接收人</label> 

      <div class="controls" style="line-height: 32px"> 
        选择所有人：
       <input type="checkbox" name="uid" value="all" checked /> 
       <br>
       <br>
       选择用户:
       <select name="uid" >
         <option value="all">请选择</option>
         @foreach($user as $row)
         <option value="{{$row->id}}" class="op">{{$row->user_name}}</option>
         @endforeach
       </select>
       <span class="help-inline"></span> 
      </div> 
     </div> 
     <br>
     <div class="control-group "> 
      <label class="control-label" for="inputWarning">内容</label> 
      <div class="controls"> 
       <textarea name="content" style="width: 400px;height: 300px; resize: none;"></textarea>
       <span class="help-inline"></span> 
      </div> 
     </div>
  {{csrf_field()}}
     <div class="form-actions"> 
      <button type="submit" class="btn blue">Save</button> 
      <button type="button" class="btn">Cancel</button> 
     </div> 
     
    </form> 
    <!-- END FORM--> 
   </div> 
  </div>
<script type="text/javascript">
  //实例化编辑器
  //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  var ue = UE.getEditor('editor');
  // 判断选择所有人是否被选中
  $('select').attr('disabled',true);
  $('input[type=checkbox]').click(function(){
     if ($(this).prop("checked")) {
          $('select').attr('disabled',true);
       } else {
          $('select').attr('disabled',false);
      }
  })
  $('select').change(function(){
    $('input[type=checkbox]').attr('disabled',true);
      if($(this).val() =='请选择'){
      $('input[type=checkbox]').attr('disabled',false);
      }
  }) 
</script>   
@endsection
@section("title",'发送消息');
