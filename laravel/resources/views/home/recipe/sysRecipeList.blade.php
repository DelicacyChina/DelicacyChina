@extends('layouts.home')
@section('title','菜谱列表')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/recipe-type.css')}}">
    <script src="{{url('assets/js/jquery.tmpl.js')}}"></script>
@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}" title="美食天下">美食天下</a>
        </div>
        <div class="logo_current left">
            <h1><a href="{{url('home/recipe/sysRecipeClass')}}" title="菜谱">菜谱</a></h1>
        </div>
        <div class="logo_search right">
            <form id="form_search" action="" method="post" target="_blank">
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
            <a href="" title="食材">食材</a>
            <a href="" title="食疗食补">食疗食补</a>
        </div>
    </div>
    <div class="w mt10 clear">
        <iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="ui_title">
                    <div class="ui_title_wrap clear">
                        <h2 class="on"><a title="包子">菜谱</a></h2>
                    </div>
                </div>
                <div class="ui_newlist_1 get_num" id="J_list">
                    <ul>
                    </ul>
                </div>
                <div class="ui-page mt10">
                    <div class="ui-page-inner">
                        <a href="javascript:void(0);">加载更多...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/html" id="con">
        <li>
            <div class="pic">
                <a href="{{url('home/recipe/sysRecipeDetail/${classid}')}}" title="${name}">
                    <img width="180" height="180" src="${pic}" class="imgLoad" >
                </a>
            </div>
            <div class="detail">
                <h2>
                    <a href="{{url('home/recipe/sysRecipeDetail/${classid}')}}">${name}</a>
                </h2>
                <p class="subcontent">${tag}</p>
                <div class="substatus clear">
                    <span class="get_nums"></span>
                </div>
            </div>
        </li>
    </script>
    <script>
        var classid = "{{$cid}}";
        $.ajax({
            url:'http://api.jisuapi.com/recipe/byclass',
            data:{classid:classid,num:3,start:0,appkey:'eb5eaa404c272bab'},
            type:'get',
            dataType:'jsonp',
            success:function(data){
                var list = data.result.list
                $('#con').tmpl(list).appendTo($('#J_list').find('ul').eq(0)[0])
            }
        })

        $('.ui-page-inner').find('a').click(function(){
            var n = $('.ui_newlist_1>ul').find('li').length
            $.ajax({
                url:'http://api.jisuapi.com/recipe/byclass',
                data:{classid:classid,num:3,start:n,appkey:'eb5eaa404c272bab'},
                type:'get',
                dataType:'jsonp',
                success:function(data){
                    var list = data.result.list
                    $('#con').tmpl(list).appendTo($('#J_list').find('ul').eq(0)[0])
                }
            })
        })
    </script>
@endsection