@extends('layouts.home')
@section('title','菜谱分类')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/recipe-type.css')}}">
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
        <form id="form_search" action="" method="post">
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
        <a target="_blank" href="" title="食疗食补">食疗食补</a>
    </div>
</div>
<div class="wrap">
    <div class="w clear">
        <div class="category_box mt20">
            @foreach($recipes as $recipe)
            <div class="category_sub clear">
                <h3>{{$recipe->recipe_name}}</h3>
                <ul>
                @foreach($recipes2 as $recipe2)
                    @if($recipe2->recipe_parentId == $recipe->id)
                        <li><a title="" href="" target="_blank">{{$recipe2->recipe_name}}</a></li>
                    @endif
                @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

