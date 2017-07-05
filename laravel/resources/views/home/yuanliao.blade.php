@extends('layouts.home')
@section('title','食材')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/yuanliao.css')}}">
@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}" title="美食天下">美食天下</a>
        </div>
        <div class="logo_current left">
            <h1><a href="" title="食材">食材</a></h1>
        </div>
        <div class="logo_search right">
            <form id="form_search" action="" method="post" target="_blank">
                <div class="searchBox J_search"><a href="javascript:;" title="搜索" class="search_Btn J_searchBTN right" id="search">搜索</a><input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
                </div>
            </form>
        </div>
        <div class="logo_nav">
            <a class=on href="" title="食材分类">食材分类<i></i><b></b></a>
            <a href="" title="营养排行">营养排行<i></i><b></b></a>
            <span style="float: left; height:18px; margin:23px 4px 0; border-right: 1px solid #ddd;"></span>
            <a target="_blank" href="" title="食疗食补">食疗食补</a>
        </div>
    </div>
    <div class="w nav_wrap2">
        <ul>
            <li><a class="on" href="" title="首页">首页</a></li>
            <li><a href="" title="肉禽类">肉禽类</a></li>
            <li><a href="" title="水产品">水产品</a></li>
            <li><a href="" title="蔬菜">蔬菜</a></li>
            <li><a href="" title="果品">果品</a></li>
            <li><a href="" title="米面豆乳">米面豆乳</a></li>
            <li><a href="" title="调味品">调味品</a></li>
            <li><a href="" title="药食及其他">药食及其他</a></li>
            <li><a href="" title="按字母A-Z检索">按字母A-Z检索</a></li>
        </ul>
    </div>
    <div class="w mt10 clear">
        <iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="category_box mt20">

                @foreach($yuanliaoos as  $key => $yuanliaoo)
                <div class="category_sub clear">
                    <h3>{{$key}}</h3>
                    <ul>
                        @foreach($yuanliaoo as $value)
                        <li>
                            <a title="黑木耳的做法" href="" target="_blank">{{$value->food_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
