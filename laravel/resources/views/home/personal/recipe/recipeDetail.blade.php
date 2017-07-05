@extends('layouts.home')
@section('title','菜谱详情')
@section('css')
	<link rel="stylesheet" href="{{url('home/css/caipu.css')}}">
	<link rel="stylesheet" href="{{url('home/css/caipu2.css')}}">
	<link rel="stylesheet" href="{{url('home/css/caipu3.css')}}">
@endsection
@section('content')
<div class="w logo_wrap2">
	<div class="logo_inner left">
		<a href="{{url('home/index')}}" title="美食天下">美食天下</a>
	</div>
	<div class="logo_current left">
		<h1><a href="" title="菜谱">菜谱</a></h1>
	</div>
	<div class="logo_search right">
		<form id="form_search" action="" method="post" >
			<div class="searchBox J_search"><a href="javascript:;" title="搜索" class="search_Btn J_searchBTN right" id="search">搜索</a><input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
		</div>
		</form>
	</div>
	<div class="logo_nav">
		<a href="">菜谱首页<i></i><b></b></a>
		<a href="">分类<i></i><b></b></a>
		<a href="">菜单<i></i><b></b></a>
		<a href="">排行<i></i><b></b></a>
		<span style="float: left; height:18px; margin:23px 4px 0; border-right: 1px solid #ddd;"></span>
		<a target="_blank" href="" title="食材">食材</a>
	</div>
</div>
<div class="w mt10 clear">
	<iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
	<div id="path" class="clear">
	所属分类：
		<a title="热菜">热菜</a>&nbsp;&nbsp;
		<a title="家常菜">家常菜</a>&nbsp;&nbsp;
		<a title="夏季食谱">夏季食谱</a>&nbsp;&nbsp;
		<a title="午餐">午餐</a>&nbsp;&nbsp;
	</div>
</div>
<div class="wrap">
	<div class="w clear">
		<div class="space_left">
			<div class="userTop clear">
				<h1 class="recipe_De_title">
					<a href="" id="recipe_title" title="">{{$cpnames}}</a>
				</h1>
				<a title="" href="{{url('home/center/index/'.$uid)}}" class="uright">
					@if(isset($yhimgs))
					<img src="{{$yhimgs}}" />
					@endif
				    <span class="userName" id="recipe_username">{{$usernames}}</span>
				</a>
			</div>
			<div class="space_box_home">
				<div class="recipDetail">
					<div class="recipe_De_imgBox" id="recipe_De_imgBox">
						<a class="J_photo" title="">
							<span></span>
							<img src="{{$cpfaces}}" alt="">
						</a>
						<p class="J_photo">
							<span class="De_bg">&nbsp;</span>
							<span class="De_photo">1张图片</span>
						</p>
					</div>
					<div class="mo mt20">
						<h3>食材明细</h3>
					</div>
					<div class="recipeCategory_sub_R clear">
						<ul>

							@foreach($yongliaos as $yongliao)
							<li>
								<span class="category_s1">
								<a href="" title=""><b>{{$yongliao->food_name}}</b></a>
								</span>
								<span class="category_s2">{{$yongliao->weight}}</span>
							</li>
							@endforeach

						</ul>
					</div>
					<div class="recipeCategory_sub_R mt30 clear">
						<ul>

							<li>
								<span class="category_s1">
								<a title="" href="" target="_blank">{{$cpkw}}</a>
								</span>
								<span class="category_s2">口味</span>
							</li>
							<li>
								<span class="category_s1">
								<a title="" href="" target="_blank">{{$cpgy}}</a>
								</span>
								<span class="category_s2">工艺</span>
							</li>
							<li>
								<span class="category_s1">
								<a title="" href="" target="_blank">{{$cphs}}</a>
								</span>
								<span class="category_s2">耗时</span>
							</li>
							<li>
								<span class="category_s1">
								<a title="" href="" target="_blank">{{$cpcj}}</a>
								</span>
								<span class="category_s2">厨具</span>
							</li>
							<li>
								<span class="category_s1">
								<a title="" href="" target="_blank">{{$cpnd}}</a>
								</span>
								<span class="category_s2">难度</span>
							</li>

						</ul>
					</div>
					<div class="mo mt20">
						<h3>{{$cpnames}}的做法步骤</h3>
					</div>
					<div class="recipeStep">
						<ul>
							@foreach($buzous as $buzou)
							<li>
								<div class="recipeStep_img">
									<img src="{{$buzou->img}}" alt="1">
								</div>
								<div class="recipeStep_word">
									<div class="recipeStep_num">1</div>{{$buzou->describe}}
								</div>
							</li>
							@endforeach
						</ul>
					</div>


					<div class="mo">
						<h3>小窍门</h3>
					</div>
					<div class="recipeTip">
						{{$cptip}}
					</div>
					<div class="recipeArction mt10 clear">
						<ul class="collect_da">
							@if(isset($collect[0]))
								<li class="fav"><a title="收藏" id="collected" href="javascript:void(0);" class="J_fav on" data=""><i></i><span></span>已收藏</a></li>
							@else
								<li class="fav"><a title="收藏" id="uncollect" href="javascript:void(0);" class="J_fav" data=""><i></i><span></span>收藏</a></li>
							@endif
						</ul>
					</div>
					<div class="recipeComment mt30" id="comment"> </div>
				</div>
			</div>
		</div>
		<div class="space_right"> 
			<div id='div-gpt-ad-1415072274645-2' style='width:300px; height:250px;'>
			</div>
			<div class="ui_title mt20 clear">
				<div class="ui_title_wrap">

				</div>
			</div>
			<div class="sList2 clear">
			
			</div>
			<div id='div-gpt-ad-1415072274645-3' style='width:300px; height:250px;margin-top:20px'>
			</div>

			<div id='div-gpt-ad-1415072274645-5' style='width:300px; height:250px;margin-top:20px'>
				
			</div>
			<div class="mt20" id="smnbk"></div>
			<div id='div-gpt-ad-1415072274645-6' style='width:300px;margin-top:20px' class="keyshow">

			</div>
		</div>
	</div>
</div>
<script>
    $('.recipeStep').find('.recipeStep_num').each(function(){
        $(this).html($(this).parent().parent().index()+1)
    })
	$('.fav').on('click','#collected',function(){
		  alert('亲,你已经收藏过了,请不要重复点击')
	})
	$('.fav').on('click','#uncollect',function(){
		var id = "{{$id}}"
		$.ajax({
			url:"/home/personal/collect/recipeCollect",
			type:'get',
			data:{rid:id},
			success:function(data){
				if(data==1){
					alert('我么收藏成功啦~~');
					$('#uncollect').html('<i></i><span></span>已收藏')
					$('#uncollect').addClass('on')
					$('#uncollect').attr('id','collected')
				} else {
					alert('小主~~请先登录~~');
				}


			}
		})
	})
</script>
@endsection
