@extends('layouts.home')
@section('title','个人主页')
@section('css')
	<link rel="stylesheet" href="{{url('home/css/vip1.css')}}">
@endsection
@section('content')
	<div class="space_wrap">
		<div class="space_info w">
			<div class="mod clear">
				<div class="pic">
					<a href="http://home.meishichina.com/space-10335278.html"><img class="imgLoad" src="http://static.meishichina.com/v6/img/blank.gif" data-src="http://i3.meishichina.com/data/avatar/010/33/52/78_avatar_big.jpg@!c200?v=1499092976" width="150" height="150" alt=""></a>
				</div>
				<div class="detail">
					<div class="subname">
						<em>
							<a href="http://home.meishichina.com/space-10335278.html">zhoujiren1234</a>
						</em>
						<i class="space_icon man"></i>
						<br>
						<i class="messagenum">2017-06-17加入</i>
					</div>
					<div class="subtools clear">
						<div class="subbtn left" style="display:none">
							<a href="javascript:void(0)" class="attention" user-id="10335278">
								<span class="num1"><i class="space_icon"></i>关注</span><span class="num2"><i class="space_icon"></i>已关注</span><span class="num3"><i class="space_icon"></i>互相关注</span><span class="num4">&nbsp;|&nbsp;</span><span class="num5">取消</span>
							</a>
							<a href="javascript:void(0);" id="sixin" class="letter" data-id="10335278"><i class="space_icon"></i>发私信</a>
						</div>
						<div class="right">
							<ul class="substatus">
								<li>
								<a title="粉丝" href="" rel="nofollow">
								<b>0</b><br>
								粉丝
								</a></li>
								<li>
								<a title="关注" href="" rel="nofollow">
								<b>8</b><br>
								关注
								</a></li>
								<li class="last">
								<a title="访问" href="" rel="nofollow">
								<b>96</b><br>
								访问
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="space_nav_wrap">
		<ul>
			<li><a title="主页" href="">主页</a></li>
			<li><a title="菜谱" href="">菜谱</a></li>
			<li><a title="话题" href="">话题</a></li>
			<li><a title="日志" href="" class="on">日志</a></li>
			<li><a title="收藏" href="" rel="nofollow">收藏</a></li>
			<li style="float:right"><a title="个人动态" href="" rel="nofollow">个人动态</a></li>
		</ul>
	</div>
	<div class="wrap">
		<div class="w clear">
			<div class="space_left">
				<div class="ui_title mt10">
					<div class="ui_title_wrap clear">
						<h3 class="on">zhoujiren1234的日志</h3>
					</div>
				</div>
				<div class="ui_newlist_1 list_blog get_num" id="J_list">
					<ul>
						<li data-id="1004399">
							<div class="pic">
								<a target="_blank" href="http://home.meishichina.com/space-10335278-do-blog-id-1004399.html" title="32131313">
									<img width="180" height="135" src="http://static.meishichina.com/v6/img/blank.gif" data-src="" class="imgLoad">
								</a>
							</div>
							<div class="detail">
								<h2>
									<a target="_blank" href="http://home.meishichina.com/space-10335278-do-blog-id-1004399.html" title="32131313">32131313</a><span class="essence"></span>
								</h2>
								<p class="subline">2017-7-1</p>
								<p class="subcontent">12313132</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="space_right">
				<div class="mt20">
					<a title="美食天下客户端" href="" >
					
						<img width="300" height="600" src="http://static.meishichina.com/v6/img/blank.gif"  class="imgLoad">
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
@endsection
