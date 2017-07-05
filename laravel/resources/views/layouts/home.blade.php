<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','美食中国')</title>
	<link rel="stylesheet" type="text/css" href="{{url('home/css/cssys.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('home/css/cssys2.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('home/css/all.css')}}">
	<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
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
	@section('css')
	@show
</head>
<body>
	<div class="top-bar" id="J_top_bar">
		<ul class="bar-left left">
			<li><a title="美食天下" href="{{url('/home/index')}}" class="top_bar_logo"><i>美食天下</i>首页</a></li>
			<li> <a title="菜谱" href="{{url('/home/recietype')}}">菜谱</a></li>
			<li> <a title="食材" href="{{url('/home/yuanliao')}}" >食材</a></li>
			<li> <a title="珍选" href="{{url('home/recipe/sysRecipeClass')}}">珍选</a></li>
			<li> <a title="问答" href="{{url('home/question')}}">问答</a></li>
			<li> <a title="社区" href="">社区</a></li>
			<li> <a title="话题" href="">话题</a></li>
			<li> <a title="活动" href="">活动</a></li>
			<li> <a title="搜索" href="">搜索</a></li>
			<li class="top_bar_more">
				<i></i>
				<div>
					<a title="烘焙" href="" >烘焙</a>
					<a title="妈妈派" href="" >妈妈派</a>
				</div>
			</li>
		</ul>
		<div class="right" id="J_top_bar_user">
			<ul class='clear bar-info right bar-isLogin' id='J_barUser'>
				@if(Auth::check())
					<li class='bar-user J_down bar-item'>
						<div class='bar-text'>
							<div class='bar-text-userName' id='J_barUserName'>
								<a href="{{url('home/center/index/'.Auth::user()->id)}}">
									<img src="{{\App\Libraries\UploadFileName::icon(Auth::user()->id)}}" alt="" class='imgLoad' width='30px' height='30px'>
								</a>
							</div>
						</div>
						<!-- <div class='bar-box'> -->
						<ul class='bar-box'>
							<li class='bar-box-item-0 bar-box-item-fav'>
								<a href="{{url('home/personal/collect/index')}}">收藏</a>
							</li>
							<li class='bar-box-item-1'>
								<a href="{{url('home/personal/setting/index')}}">设置</a>
							</li>
							<li class='bar-box-item-2'>
								<a href="{{url('home/personal/letter/index')}}" id='privately_list'>私信<span></span></a>
							</li>
							<li class='bar-box-item-3'>
								<a href="{{url('home/personal/letter/sysindex')}}" id='my_notice_list'>通知<span></span></a>
							</li>
							<li class='bar-box-item-4'>
								<a href="{{url('home/logout')}}" id='J_barExit'>退出</a>
							</li>
						</ul>
						<!-- </div> -->
					</li>
				@else
					<li class="bar-link bar-item bar-reg" style="display: block">
						<a href="{{url('home/register')}}" >注册</a>
					</li>
					<li class="bar-link bar-item bar-login" style="display: block">
						<a href="{{url('home/login')}}" class="on">登录</a>
					</li>
				@endif
				<li class='bar-add J_down bar-item'>
					<div class='bar-text'>
						<img src="{{url('home/images/nr1.png')}}" alt="" width='18px' height='18px'>发布
					</div>
					<ul class='bar-box'>

						<li class='bar-box-item-0'>
							<a href="{{url('home/personal/recipe/addRecipe')}}">发菜谱</a>
						</li>
						<li class='bar-box-item-1'>
							<a href="{{url('home/personal/talk/addTalk')}}">发话题</a>
						</li>
						<li class='bar-box-item-2'>
							<a href="{{url('home/personal/blog/add')}}">发日志</a>
						</li>

					</ul>
				</li>
				<li class='bar-item bar-sign J_down' id='J_barSign'>
					<a href="javascript:void(0);" class='bar-sign-text J_barLogin bar-sign-text-ok'>
						<img src="{{url('home/images/nr2.png')}}" alt="" width='18px' height='18px'>已签到
					</a>
					<ul class='bar-sign-box'>

						<li>
							<p><b>0</b></p>
						</li>
						<li>
							<a href="">去抽奖</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	@section('content')
	@show
	@section('footer')
	<div id="J_footer_box" class="footer-area clear">
		<div class="w">
			<div class="ft1">
				<p class="c3b"><a  href="" title="美食天下 - 让吃更美好">美食中国 - 让吃更美好！</a></p>
				<p class="c3c">
				<a title="菜谱" href="">菜谱</a> ·
				<a title="食材" href="">食材</a> ·
				<a title="美食魔方" href="">魔方</a> ·
				<a href="" title="关于我们">关于我们</a> ·
				<a href="" title="联系我们">联系我们</a> ·
				<a href="" title="加入我们">加入我们</a> ·
				<a href="" title="服务声明">服务声明</a> ·
				<a href="" title="友情链接">友情链接</a> ·
				<a href="" title="网站地图">网站地图</a> ·
				<a title="移动应用" href="">移动应用</a>
				</p>
				<p>&copy; 20017-06 美食中国工作组 保留所有权利 - 沪ICP证062301号</p>
			</div>
		</div>
	</div>

	@show
	@section('js')
		<script>
			$(function(){
				$("#J_top_bar_user li").mouseover(function(){
					// $(this).css('background-color', 'red');
					$(this).children('ul').show();
				}).mouseout(function(){
					// $(this).css('background-color', '');
					$(this).children('ul').hide();
				})
			})
		</script>
	@show
</body>
</html>



