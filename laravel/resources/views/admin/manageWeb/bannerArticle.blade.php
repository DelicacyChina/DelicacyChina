@extends('layouts.admin')
@section('crumb')
    <li><a>网站页面视图管理</a></li>
    <li class="'active">banner管理</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                Banner文章列表
            </h1>
        </div><!-- /.page-header -->

        <div class="hr hr-18 dotted hr-double"></div>

        <h4 class="pink">
            <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
            <a href="{{url('admin/manageWeb/banner/article/add')}}"  class="green"> 添加新的banner文章 </a>
        </h4>
        <div class="hr hr-18 dotted hr-double"></div>

        <ul class="banner_articleList">

        </ul>
    </div>
@endsection
@section('js')
    <style>
         .banner_articleList li{
             float: left;
             margin: 0 45px 20px 0;
             text-align: center;
             width: 260px;
             height: 320px;
             overflow: hidden;
         }
         .banner_articleList li a p{
            font-size: 18px;
            line-height: 120%;
            padding: 5px 0;
        }
        .banner_articleList li a i img{
            width: 260px;
            height: 300px;
            margin-top: -25px;
            transition: all .5s ease-in-out;
        }
    </style>
    <script type="text/html" id="articleList">
        <li>
            <a title="千道宴客菜" href="/admin/manageWeb/banner/article/detail/${id}">
                <i>
                    <img class="imgLoad" src=${face_img}>
                </i>
                <p>${banner_title}</p>
            </a>
        </li>
    </script>
    <script>
        $(function(){
            $.ajax({
                url:'/admin/manageWeb/banner/article/list',
                type:'get',
                success:function(data){
                    $('#articleList').tmpl(data).appendTo('.banner_articleList');
                },
                dataType:'json'
            })
            $('.nav-list > li').eq(1).attr('class','active')
        })
    </script>
@endsection