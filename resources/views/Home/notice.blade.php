@extends("Home.public")
@section('main')
<div class="top-user">
      <div class="inner">
        <a class="logo" href="/"><img src="/static/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
        <div class="title">公告</div>
      </div>
    </div>
  <section class="panel__div panel-message__div clearfix" style="height:500px"> 
   <div class="filter-value"> 
    <div class="filter-title">
     平台公告
    </div> 
   </div> 
   <div class="pull-left"> 
    <div class="msg-list"> 
    @foreach($lists as $row)
     <a class="ep @if($row->id == $list->id) active @endif" href="/home/notice?id={{$row->id}}">【公告】{{$row->title}}~</a> 
    @endforeach
    </div> 
   </div> 
   <div class="message-box pull-right" style="height:400px"> 
    <div class="head-div clearfix posr"> 
     <div class="title">
      {{$list->title}}
     </div> 
     <div class="time pull-right">
      发布时间：{{date('Y-m-d H:i:s',$list->time)}}
     </div> 
    </div> 
    <div class="html-code"> 
     <p></p> 
     {!!$list->content!!}
    </div> 
   </div> 
  </section>
@endsection
@section('title','公告')