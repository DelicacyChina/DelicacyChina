@extends('layouts.home')
@section('title','我的话题')
@section('css')
	<link rel="stylesheet" href="{{url('home/css/topic.css')}}">
@endsection
@section('content')
	<!-- 主框架 -->
<div class="w_main clear">
	@include('layouts.personal')
	<script>
		$('#talk').attr('class','on');
	</script>
	 <!-- 右侧 -->
	<div class="mod_right">
		<div id="mod_location">
			<div class="mod_location clear">
				<div class="left">
					<a href="" class="on">我的话题</a>
				</div>
				<div class="right">
					<a class="add" href="{{url('home/personal/talk/addTalk')}}">发布新话题</a>
				</div>
			</div>
		</div>
		@if(!isset($res[0]))
			<div class="ui_no_data">
				<p>您还没有发布话题噢，快点击这里<a href="{{url('home/personal/talk/addTalk')}}" >发布话题</a>吧！
				</p>
			</div>
		@else
			<div class="ui_newlist_1 get_num mt60 clear" id="J_list">
				<ul>
					@foreach($res as $r)
						<li>
							<div class='left'>
								<div class='detail' style='padding: 16px 0 0 16px'>
									<h2>{{$r->title}}</h2>
									<p class='subline'>{{$r->updated_at}}</p>
									<p class='subcontent'><a href="{{url('home/personal/talk/talkDetail/'.$r->id)}}">{{$r->content}}</a></p>
									<div class='substatus clear'>
										<span class='get_nums' style='display: none;'>0人收藏，0次阅读</span>
									</div>
								</div>
							</div>
							<div class='right'>
								<a href="{{url('home/personal/talk/delTalk/'.$r->id)}}">删除</a>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		@endif

	</div><!-- 右侧结束 -->
</div>
@endsection
@section('footer')
@endsection
