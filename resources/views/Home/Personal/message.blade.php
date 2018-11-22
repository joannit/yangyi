@extends('Home.Personal.public')
@section('right')
<style type="text/css">
	.msg-list{margin-left: 20px}
</style>


			<div class="pull-left">
				<div class="msg-list">
					@foreach($msgall as $row)
					<a class="ep @if($row->id == $msg->id) active @endif " href="/message?id={{$row->id}}">【消息】{{$row->content}} ...</a>
					@endforeach
				</div>
			</div>
			<div class="message-box pull-right" style="width: 500px">

				<div class="head-div clearfix posr">
					<div class="title">消息</div>
					<div class="time pull-right">发布时间：{{date('Y-m-d H:i',$msg->time)}}</div>
				</div>
				<div class="html-code">
					<p></p>
					<p style="text-indent: 2em">{{$msg->content}}</p>
				</div>
				<br>
				<span style="margin-left:450px; "><a href="/delmessage/{{$msg->id}}" class="btn btn-danger" align="right">删除</a></span>
			</div>

@endsection
@section('title','消息')