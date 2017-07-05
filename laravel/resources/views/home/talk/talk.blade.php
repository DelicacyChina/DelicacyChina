@extends('layouts.home')
@section('title','美食话题')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('/home/css/talk.css')}}" />
	<style type="text/css">
		.footer-area{padding:10px 0}
		.footer-area .w{padding-top:10px;border-top:1px solid #e8e8e8}
		.footer-area a{color:#666}
		.footer-area a:hover{color:#ff6767}
		.ft1{clear:none;float:left;font-size:11px;color:#666;width:680px;padding-top:10px}
		.ft1 .c3b{color:#c90;font-size:14px;font-weight:700;margin-bottom:6px}
		.ft1 .c3b a{color:#f50}
		.ft1 .c3c{color:#aaa;font-size:12px;margin-bottom:6px}
		.ft2,.ft3,.ft4{clear:none;float:right;text-align:center}
		.ft3{margin:0 25px}
	</style>

@endsection

@section('content')
	<div class="w logo_wrap2">
		<div class="logo_inner left">
			<a href="{{url('home/index')}}" title="美食天下">美食天下</a>
		</div>
		<div class="logo_current left">
			<h1><a href="" title="社区">社区</a></h1>
		</div>
		<div class="logo_search right">
			<form id="form_search" action="" method="post">
				<div class="searchBox J_search">
					<a href="javascript:;" title="搜索" class="search_Btn J_searchBTN right" id="search">搜索</a>
					<input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
				</div>
			</form>
		</div>
		<div class="logo_nav">
			<a href="" title="社区广场">社区广场<i></i><b></b></a>
			<a class="on" href="" title="话题">话题<i></i><b></b></a>
			<a href="" title="日志">日志<i></i><b></b></a>
			<a href="" title="活动">活动<i></i><b></b></a>
		</div>
	</div>
	<div class="nav_wrap2">
		<ul>
			<li><a class="on" href="" title="全部">全部</a></li>
			<li><a href="" title="美食随手拍">美食随手拍</a></li>
			<li><a href="" title="烘焙圈">烘焙圈</a></li>
			<li><a href="" title="妈妈派">妈妈派</a></li>
			<li><a href="" title="饮食健康">饮食健康</a></li>
			<li><a href="" title="厨艺交流">厨艺交流</a></li>
			<li><a href="" title="最美之物">最美之物</a></li>
			<li><a href="" title="美好时光">美好时光</a></li>
			<li><a href="" title="帮助与反馈">帮助与反馈</a></li>
		</ul>
	</div>
	<div class="w mt10 clear">
		<iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
	</div>
	<div class="wrap">
		<div class="w clear">
			<div class="space_left">
				<div class="ui_title">
					<div class="ui_title_wrap clear ">
						<h2 class="on">
						话题</h2>
						<a class="right " href="" rel="nofollow">精华</a>
						<a class="right " href="" rel="nofollow">热门</a>
						<a class="right " href="">最新</a>
						<a class="right on" href="">全部</a>
					</div>
				</div>
				<div class="pin_list clear" id="J_list">
					<ul>
						@foreach($res as $re)
						<li>
							<div class="u">
								<a href="" target="_blank" title="cfyend">
									<img width="40" height="40" class="imgLoad" src="{{$re->icon}}" >
								</a>
								<div>
									<a href="" class="t" target="_blank" title="cfyend">{{$re->u_username}}</a>
									<span>{{$re->time}}</span>
								</div>
							</div>
							<div class="c clear">
								<div class="pp">
									<a href="{{url('home/personal/talk/talkDetail/'.$re->tid)}}">{{$re->title}}</a>
								</div>
								<a class="clear" href="{{url('home/personal/talk/talkDetail/'.$re->tid)}}">
									{{$re->content}}<br>
									@if(isset($d[$re->tid]))
										@foreach($d[$re->tid] as $value)
											<img class="imgLoad" src="{{$value}}" >
										@endforeach
									@endif
								</a>
								<div class="f"></div>
								<div class="num"><span></span></div>
							</div>
						</li>
						@endforeach
					</ul>

				</div>
				<div class="ui-page mt20">{{ $res->links() }}
				</div>
			</div>
			<div class="space_right">
				<a class="r_pai-add" href="{{url('/home/personal/talk/addTalk')}}">发布话题</a>
			</div>
		</div>
	</div>
@endsection

