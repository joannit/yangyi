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
    	@if(count($cart))
    	<div style="text-align: right"><a href="/" class="btn btn-success">继续购物</a></div>
    	@endif
     <div class="title">
      购物车	
     </div> 

     <form action="/order" class="shopcart-form__box" method="post" > 
      <table class="table table-bordered"> 
       <thead> 
        <tr> 
         <th width="150"> <label class="checked-label"><i></i>选择</label> </th> 
         <th width="300">商品信息</th> 
         <th width="150">单价</th> 
         <th width="200">数量</th> 
         <th width="200">小计</th> 
         <th width="80">操作</th> 
        </tr> 
       </thead> 
       <tbody> 
       	@if(count($cart))
       	@foreach($cart as $row)
        <tr> 
         <th scope="row"> <label class="checked-label"><i style="margin-left:-20px"><input class="int" type="checkbox" value="{{$row->cid}}" /></i> 
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
         <td class="price">&yen;<span>{{$row->gprice}}</span></td> 
         <td> 
          <div class="cart-num__box"> 
           <input type="button" class="sub" value="-" /> 
           <input type="text" class="val" value="{{$row->num}}" maxlength="2" /> 
           <input type="button" class="add" value="+" /> 
           <input type="hidden" name="id[]" value="{{$row->cid}}">
          </div> </td> 
         <td class="my">&yen;<span>{{$row->gprice*$row->num}}</span></td> 
         <td><a href="jacascript::void(0)" class="del">删除</a></td> 
        </tr> 
        @endforeach
       {{csrf_field()}}

       </tbody> 
      </table> 
      <div class="user-form-group tags-box shopcart-submit pull-right"> 
       <button type="submit" class="btn">提交订单</button> 
      </div> 
      <div class="checkbox shopcart-total"> 
       <label><input type="checkbox" class="check-all" /> 全选</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="jacascript::void(0)" class="delall">删除</a> 
       <div class="pull-right">
         已选商品 
        <span>0</span> 件 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费） 
        <b class="cr">&yen;<span class="fz24"></span></b> 
       </div> 
	</form>
      </div> 
 		@else
        
        	<center><font size="5">暂无数据 <a href="/">点击购物</a></font></center>
   		 
        @endif

    </div> 
   </section> 
  </div>	
      <script>
						$(document).ready(function(){
						
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
						test();
					}
				})	
			})
			// 数量加操作
			$('input[class=add]').click(function(){
				var num = parseInt($(this).prev().val())+1;
				var id = $(this).next().val();
				var price = parseFloat($(this).parents().prev('td').find('span').html());
				var vals= (Number(price*num)).toFixed(2);
				var c =$(this);
				$.get('/cartadd',{num:num,id:id},function(data){
					if(data == 1){
						c.parents().next('td').children('span').html(vals);	
						// 总金额刷新
						test();
					test();
					}else{
						alert('库存数不够');
						c.prev().val(num-1);
						test();
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
				var price = parseFloat($(this).parents().prev('td').find('span').html());
				var vals= (Number(price*num)).toFixed(2);
				$.get('/cartadd',{num:num,id:id},function(data){
					if(data == 1){
					c.parents().next('td').children('span').html(vals);
						// 总金额刷新
					test();
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
			      // alert(id);
			      test();
    			}
    		})
			})
			var i=1;
			// 全选
			
			 // 总数量
			$('.check-all').click(function(){
				s = $('.my').length;
				if(i == 1){
				$(".table").find("tr").each(function(){
				$(this).find(":checkbox").prop("checked",true);
				});
				// 遍历所有的小计
				test();
				i = 2
				} else {
					// 取消全选
					i = 1;
					$(".table").find("tr").each(function(){
					$(this).find(":checkbox").removeAttr("checked");
					})
					m = 0
					$('.fz24').html(m);
					s = 0
					$('.pull-right').find('span:first').html(s);
				}
			});
			// 全选删除
			$('.delall').click(function(){
				arr=[];
				$(".int").each(function(){
			    if($(this).prop("checked")){
			    id=$(this).val();
      			arr.push(id);
			  }
			  });
				 $.get('/cartdels',{arr:arr},function(data){   
			    if(data==1){
			      //遍历arr数组
			      for(var i=0;i<arr.length;i++){
			        //获取选中数据input
			        $("input[value='"+arr[i]+"']").parents("tr").remove();
			        if($('tbody').find('tr').length <1){
			        $('form').remove();
			        $('.bgf').html('<center><font size="5">暂无数据 <a href="/">点击购物</a></font></center>');
			        }
			      }
			    }else{
			        alert(data);
			      }
  				})
			})
			// alert(($(this).parents().find('td[class=my]').html().replace(/[^0-9]/ig,"")));
			// 单击单选框
			// 总计
			$('.int').click(function(){
				test();
			})
			function test(){
				var s = 0;
				var m = 0;
				$('.int').each(function(){
				if($(this).prop("checked")){
				m+=parseFloat($(this).parents('tr').find('td[class=my]').children('span').html());
				s+=1;
				}
				});
				$('.pull-right').find('span:first').html(s);
				$('.fz24').html(m);
			}
			// 数量失去焦点事件
			$('.val').blur(function(){
				var id = $(this).next().next().val();
				var num = $(this).val();
				var c = $(this);
				var price = $(this).parents().prev().find('span').html();
				// alert(price);
				var vals= (Number(price*num)).toFixed(2);
				$.get('/cartadd',{num:num,id:id},function(data){
					if(data == 1){
					c.parents().next('td').find('span').html(vals);
						// 总金额刷新
					test();
				}else{
					alert('库存数不够或数量为发生改变');
					c.val(1);
					test();
				}
			})
			})
			var a = 0;
			// 提交订单
			$('.btn').click(function(){
				// 如果没有选中就删除隐藏框
				$('.int').each(function(){
				if(!$(this).prop("checked")){
					$(this).parents('tr').find('input[type=hidden]').remove();
				}else{
					a++;
				}
				});
			})
			$('.check-all').trigger('click');
			$('form').submit(function(){
				if(a>0){
					return true;
				}else{
					alert('请选择商品');
					return false;
				}
			// 小计刷新

			})
		</script>

    
@endsection
@section('title','购物车')