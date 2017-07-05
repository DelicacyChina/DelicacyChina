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
            <a class=on href="">分类<i></i><b></b></a>
            <a href="">菜单<i></i><b></b></a>
            <a href="l">排行<i></i><b></b></a>
            <span style="float: left; height:18px; margin:23px 4px 0; border-right: 1px solid #ddd;"></span>
            <a href="" title="食材">食材</a>
            <a href="" title="食疗食补">食疗食补</a>
        </div>
    </div>
    <div class="nav_wrap2">
        <ul id="'dnav">
            <li><a href="{{url('home/recipe/sysRecipeClass')}}" class="on">全部</a></li>
        </ul>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="category_box mt20" id="ct">

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{url('assets/js/jquery.tmpl.js')}}"></script>
    <script type="text/html" id="reclass">
        <div class="category_sub clear">
            <h3>${name}</h3>
            <ul>

                {%each(key,value) list%}
                    <li><a href='/home/recipe/sysRecipeList/${value.classid}'>${value.name}</a></li>
                {%/each%}
            </ul>
        </div>
    </script>
    <script type="text/html" id="nav">
        <li class="recipeClass"><a href="javascript:;" data-id="${classid}">${name}</a></li>
    </script>
    <script>
        $.ajax({
            url:'http://api.jisuapi.com/recipe/class?appkey=eb5eaa404c272bab',
            type:'get',
            dataType:'jsonp',
            success:function(data){
                data = data['result'];
                $('#reclass').tmpl(data).appendTo($('#ct'));
                $('#nav').tmpl(data).appendTo($('.nav_wrap2').find('ul').eq(0))
            }
        })
        $('.nav_wrap2').on('click','.recipeClass',function(){
            var classid = $(this).find('a').attr('data-id');
            $(this).siblings().each(function(){
                $(this).find('a').removeClass('on')
            })
            $(this).find('a').addClass('on')
            $.ajax({
                url:'http://api.jisuapi.com/recipe/class?appkey=eb5eaa404c272bab',
                type:'get',
                dataType:'jsonp',
                success:function(data){
                    data = data['result'];
                    html='';
                    for(var i = 0;i<data.length;i++){
                       if(data[i].classid == classid) {
                           html +=  '<div class="category_sub clear">';
                           html += '<h3>'+data[i].name+'</h3>';
                           html += '<ul>';
                           for(var j = 0; j<data[i].list.length;j++){
                               url = "{{url('home/recipe/sysRecipeList')}}" +'/'+data[i].list[j].classid;
                               html += "<li><a href='"+url+"'>"+data[i].list[j].name+"</a></li>";
                           }
                           html += '</ul></div>'
                           break;
                       }
                    }
                    $('.category_box').html(html);
                }
            })
        })
    </script>
@endsection

