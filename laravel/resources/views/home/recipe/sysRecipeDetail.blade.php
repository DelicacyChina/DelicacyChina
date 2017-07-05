@extends('layouts.home')
@section('title','菜谱详情')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/caipu.css')}}">
    <link rel="stylesheet" href="{{url('home/css/caipu2/.css')}}">
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
            <form id="form_search" action="" method="post" target="_blank">
                <div class="searchBox J_search"><a href="javascript:;" title="搜索" class="search_Btn J_searchBTN right" id="search">搜索</a><input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
                </div>
            </form>
        </div>
        <div class="logo_nav">
            <a href="">菜谱首页<i></i><b></b></a>
            <a href="">分类<i></i><b></b></a>
            <a href="">菜单<i></i><b></b></a>
            <a href="l">排行<i></i><b></b></a>
            <span style="float: left; height:18px; margin:23px 4px 0; border-right: 1px solid #ddd;"></span>
            <a href="" title="食材">食材</a>
            <a href="" title="食疗食补">食疗食补</a>
        </div>
    </div>
    <div class="w mt10 clear">
        <iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
        <div id="path" class="clear">
            所属分类： <span></span>
        </div>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="userTop clear">
                    <h1 class="recipe_De_title">
                        <a href="" id="recipe_title" title=""></a>
                    </h1>
                    <a title="" href=""  class="uright">
                        <span class="userName" id="recipe_username"> 美食中国小助手发布</span>
                    </a>
                </div>
                <div class="space_box_home">
                    <div class="recipDetail">
                        <div class="recipe_De_imgBox" id="recipe_De_imgBox">
                            <a class="J_photo" >
                                <span></span>
                                <img src="" alt="">
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
                            <ul id="food">

                            </ul>
                        </div>
                        <div class="mo mt20">
                            <h3><span id="food_name"></span>的做法步骤</h3>
                        </div>
                        <div class="recipeStep">
                            <ul id="step">

                            </ul>
                        </div>
                        <div class="mo">
                            <h3>笔记</h3>
                        </div>
                        <div class="recipeTip">

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
        var id = "{{$rid}}";
        $.ajax({
            url:'http://api.jisuapi.com/recipe/detail',
            type:'get',
            data:{id:id,appkey:'eb5eaa404c272bab'},
            dataType:'jsonp',
            success:function(data){
                data = data.result;
                $('#path').find('span').html(data.tag);
                $('#recipe_title').html(data.name)
                $('#food_name').html(data.name)
                $('#recipe_De_imgBox').find('img').attr('src',data.pic)
                var html = ''
                for (var i=0;i<data.material.length;i++){
                    html += '<li>';
                    html += '<span class="category_s1">'
                    html += '<a href="" title=""><b>'+data.material[i].mname+'</b></a>'
                    html += '</span>'
                    html += '<span class="category_s2">'+data.material[i].amount+'</span></li>'
                }
                $('#food').html(html)
                var html='';
                for(var i= 0;i<data.process.length;i++){
                    html += '<li>'
                    html += '<div class="recipeStep_img">'
                    html += '<img src="'+data.process[i].pic+'">'
                    html += '</div>'
                    html += '<div class="recipeStep_word">'
                    html += '<div class="recipeStep_num">'+(i+1)+'</div>'+data.process[i].pcontent
                    html += '</div>'
                    html += '</li>'
                }
                $('#step').html(html)
                $('.recipeTip').html(data.content)
            }

        })
    </script>
@endsection
