@extends('Home.public')
@section('main')
<div class="top-user">
			<div class="inner">
				<a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">购物车</div>
			</div>
		</div>
		<div class="content clearfix bgf5"> 
   <section class="user-center inner clearfix"> 
    <div class="user-content__box clearfix bgf"> 
     <div class="title">
      购物车
     </div> 
     <form action="udai_shopcart_pay.html" class="shopcart-form__box"> 
      <table class="table table-bordered"> 
       <thead> 
        <tr> 
         <th width="150"> <label class="checked-label"><input type="checkbox" class="check-all" /><i></i> 全选</label> </th> 
         <th width="300">商品信息</th> 
         <th width="150">单价</th> 
         <th width="200">数量</th> 
         <th width="200">小计</th> 
         <th width="80">操作</th> 
        </tr> 
       </thead> 
       <tbody> 
       	@foreach($cart as $row)
        <tr> 
         <th scope="row"> <label class="checked-label"><input type="checkbox" value="{{$row->cid}}" /><i></i> 
           <div class="img">
            <img src="/uploads/goods/{{$row->pic}}" alt="" class="cover" />
           </div> </label> </th> 
         <td> 
          <div class="name ep3">
           {{$row->name}}
          </div> 
          <div class="type c9">
           颜色分类：{{$row->cname}} 尺码：{{$row->value}}
          </div> </td> 
         <td class="price">&yen;{{$row->gprice}}</td> 
         <td> 
          <div class="cart-num__box"> 
           <input type="button" class="sub" value="-" /> 
           <input type="text" class="val" value="{{$row->num}}" maxlength="2" /> 
           <input type="button" class="add" value="+" /> 
           <input type="hidden" name="id[]" value="{{$row->cid}}">
          </div> </td> 
         <td>&yen;{{$row->gprice*$row->num}}</td> 
         <td><a href="jacascript::void(0)" class="del">删除</a></td> 
        </tr> 
        @endforeach
       </tbody> 
      </table> 
      <div class="user-form-group tags-box shopcart-submit pull-right"> 
       <button type="submit" class="btn">提交订单</button> 
      </div> 
      <div class="checkbox shopcart-total"> 
       <label><input type="checkbox" class="check-all" /><i></i> 全选</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="jacascript::void(0)" class="delall">删除</a> 
       <div class="pull-right">
         已选商品 
        <span>2</span> 件 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费） 
        <b class="cr">&yen;<span class="fz24">40.00</span></b> 
       </div> 
      </div> 
      <script>
						$(document).ready(function(){
							var $item_checkboxs = $('.shopcart-form__box tbody input[type="checkbox"]'),
								$check_all = $('.check-all');
							// 全选
							$check_all.on('change', function() {
								$check_all.prop('checked', $(this).prop('checked'));
								$item_checkboxs.prop('checked', $(this).prop('checked'));
							});
							// 点击选择
							$item_checkboxs.on('change', function() {
								var flag = true;
								$item_checkboxs.each(function() {
									if (!$(this).prop('checked')) { flag = false }
								});
								$check_all.prop('checked', flag);
							});
							// 个数限制输入数字
							$('input.val').onlyReg({reg: /[^0-9.]/g});
							// 加减个数
							$('.cart-num__box').on('click', '.sub,.add', function() {
								var value = parseInt($(this).siblings('.val').val());
								if ($(this).hasClass('add')) {
									$(this).siblings('.val').val(Math.min((value += 1),99));
								} else {
									$(this).siblings('.val').val(Math.max((value -= 1),1));
								}
							});
						});
					</script> 
		<script type="text/javascript">
			// 删除操作
			
			$('.del').click(function(){
				var c = $(this);
				var id = $(this).parents().find('input:last').val();
				$.get('/cartdel',{id:id},function(data){
					if(data ==1){
						c.parents('tr').remove();
					}
				})	
			})
			// 数量加操作
			$('input[class=add]').click(function(){
				var num = parseInt($(this).prev().val())+1;
				var id = $(this).next().val();
				var price = parseInt($(this).parents().prev().html().replace(/[^0-9]/ig,""));
				var vals= price*num;
				var c =$(this);
				$.get('/cartadd',{num:num,id:id},function(data){
					if(data == 1){
						c.parents().next('td').html('¥'+vals);
					}else{
						alert(data);
						c.prev().val(num-1);
					}
				})
			});
			// 数量减操作
			$('input[class=sub]').click(function(){
				var c= $(this);
				var num = parseInt($(this).next().val())-1;
				if(num < 1 ){
					num =1;
				}
				var id = $(this).next().next().next().val();
				var price = parseInt($(this).parents().prev().html().replace(/[^0-9]/ig,""));
				var vals= price*num;
				$.get('/cartadd',{num:num,id:id},function(data){
					if(data == 1){
						c.parents().next('td').html('¥'+vals);
					}else{
						c.prev().val(num-1);
					}
				})
			});
			// 选择删除
			$('.delall').click(function(){
				arr=[];
				//遍历
			  $(":checkbox").each(function(){
			    if($(this).attr("checked")){
			      //获取选中数据的id
			      id=$(this).val();
			      arr.push(id);
			      alert(id);
    			}
    		})
			})
		</script>

     </form> 
    </div> 
   </section> 
  </div>
@endsection
@section('title','购物车')