@extends('Home.Personal.public')
@section('right')
<script type="text/javascript" src="/static/home/js/jquery-1.8.3.min.js"></script>
<div class="pull-right"> 
   <div class="user-content__box clearfix bgf"> 
    <div class="title">
     账户信息-收货地址
    </div> 
    <form action="/paddress/add" class="user-addr__form form-horizontal" role="form" method="post" id="fr"> 
     <p class="fz18 cr">新增收货地址</p> 
     <div class="form-group"> 
      <label for="name" class="col-sm-2 control-label">收货人姓名：</label> 
      <div class="col-sm-6"> 
       <input class="form-control" name="aname" placeholder="请输入姓名" type="text" required /> 
      </div> 
     </div> 
     <div class="form-group"> 
      <label for="details" class="col-sm-2 control-label">收货地址：</label> 
      <div class="col-sm-10"> 
    <div class="addr-linkage">
                  <select  id="sid">
                    <option value="" class="ss" >--请选择--</option>
                  </select>
                  <input type="hidden" name="city">
                  
    </div>
       <input class="form-control" id="details" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码等信息" maxlength="30" type="text" / name="address_info" required>
      </div> 
     </div> 

     <div class="form-group"> 
      <label for="mobile" class="col-sm-2 control-label">手机号码：</label> 
      <div class="col-sm-6"> 
       <input class="form-control" id="mobile" placeholder="请输入手机号码" type="text" name="aphone" required/> 
       <span></span>
      </div> 
     </div>  
     {{csrf_field()}}

     <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-6"> 
       <button type="submit" class="but">保存</button> 
      </div> 
     </div> 
    </form> 
    <p class="fz18 cr">已保存的有效地址</p> 
    <div class="table-thead addr-thead"> 
     <div class="tdf1">
      收货人
     </div> 
     <div class="tdf3">
      <div class="tdt-a_l">
       收货地址
      </div>
     </div> 
     <!-- <div class="tdf1">邮编</div> --> 
     <div class="tdf1">
      手机
     </div> 
     <div class="tdf1">
      操作
     </div> 
     <div class="tdf1"></div> 
    </div> 
    <div class="addr-list"> 
    @foreach($info as $row)
     <div class="addr-item"> 
      <div class="tdf1">
       {{$row->aname}}
      </div> 
      <div class="tdf3 tdt-a_l">
       {{$row->address}}
      </div> 
      <!-- <div class="tdf1">350104</div> --> 
      <div class="tdf1">
       {{$row->aphone}}
      </div> 
      <div class="tdf1 order"> 
       <a href="/paddress/editadd/{{$row->id}}">修改</a>
       <a href="/paddress/deladdress/{{$row->id}}">删除</a> 
      </div> 
      <div class="tdf1">
        @if($row->default == 1)
        <a class="default active">默认地址</a>
        @else
       <a href="/paddress/default/{{$row->id}}" class="default">设为默认</a> 
       @endif
      </div> 
     </div> 
     @endforeach
    </div> 
   </div> 
  </div>
  <script type="text/javascript">
    // 第一级别获取
    $.get('/city',{upid:0},function(data){
      // console.log(data);
      // 禁止请选择选中
      $('.ss').attr('disabled','true');
      // 得到的数据数组内容 遍历每一个对象
      for(var i=0;i<data.length;i++){
        // 将我们遍历得到的地址写在option标签中
        var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        // 将得到的option标签放入到select对象中
        $('#sid').append(info);
      }
    },'json');
    // 其他级别内容
    //live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
    $('select').live('change',function(){
        // 将当前的对象存储起来
        obj = $(this);
        // 通过ID查找下一个
        id = $(this).val();
        // 清除所有其他的select
        obj.nextAll('select').remove();
        // alert(id);
        $.getJSON('/city',{upid:id},function(data){
            // alert(data);
            if(data !=''){
                // 创建一个select标签
                var select = $('<select></select>');
                //防止当前城市没有办法选择所以我们先写上一个请选择option标签
                var op = $('<option value="" class="mm">--请选择--</option>');
                select.append(op);
                // 循环得到的数组里面的option标签添加到selete
                for(var i=0;i<data.length;i++){
                    var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                    select.append(info);
                }
                // 将select标签添加到当前标签后面
                obj.after(select);
                // 把其他级别的请选择禁用
                $('.mm').attr('disabled','true');
            }
        })
    });
    // 获取选中的数据提交操作页面
    $('button').click(function(){
        arr = [];
        $('select').each(function(){
            // 获取 当前select被选中的option标签文本
            opdata = $(this).find('option:selected').html();
            // 将我们得到的每个值放置到数组中 push()
            arr.push(opdata);
        })
        //将得到的数组直接赋值给隐藏域的value值即可
        $('input[name=city]').val(arr);
    })
     var result=false;
    // 手机号正则
    $('#mobile').blur(function(){
        var p = $('#mobile').val();
        var patrn = /^\d{11}$/;
        if(patrn.test(p)){
            $(this).next().html('');
            result = true;
          }else{
            $(this).next().html('手机号输入有误');
          } 
    })

    $('#fr').submit(function(){
        $('#mobile').trigger("blur");
        if(!result){
            return false;
        }  
    });
  </script>
@endsection
@section('title','个人中心')