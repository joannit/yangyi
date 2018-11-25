@extends('Home.Personal.public')
@section('right')
<html>
 <head></head>
 <body>
  <div class="user-content__box clearfix bgf"> 
   <div class="title">
    订单中心-我的收藏
   </div> 
   <div class="collection-list__area clearfix"> 
   @foreach($data as $row)
    <div class="item-card"> 
     <a href="item_show.html" class="photo"> <img src="/uploads/goods/{{$row->pic}}" alt="{{$row->name}}" class="cover" /> 
      <div class="name">
      {{$row->name}}
      </div> </a> 
     <div class="middle"> 
      <div class="price">
       <small>￥</small>{{$row->price}}
      </div> 
      <div class="sale">
       <a href="/houses/{{$row->gid}}">取消收藏</a>
      </div> 
     </div> 
    </div>
    @endforeach()
  
  </div>
 </body>
</html>
@endsection
@section('title','个人中心')