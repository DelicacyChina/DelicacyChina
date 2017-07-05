@extends('layouts.home')
@section('title','个人收藏')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/mycollect.css')}}">
@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
        @include('layouts.personal')
        <script>
            $('#collect').attr('class','on')
        </script>
        <!-- 右侧 -->
        <div class="mod_right">
            <div id="mod_location">
                <div class="mod_location clear">

                    <div class="left">
                        <a href="" class=on>我收藏的菜谱</a>
                    </div>

                </div>
            </div>
            <div class="ui_newlist_1 get_num mt60 clear" id="J_list">
                <ul>
                    @foreach($collects as $c)
                    <li data-id="335351">
                        <div class="left">
                            <div class="pic">
                                <a title="{{$c->recipe_name}}" href="{{url('home/personal/recipe/recipeDetail/'.$c->rid)}}">
                                    <img class="imgLoad" src="{{$c->face}}"  width="180" height="180" />
                                </a>
                            </div>

                            <div class="detail">
                                <h2>
                                    <a title="" href="{{url('home/personal/recipe/recipeDetail/'.$c->rid)}}">{{$c->recipe_name}} </a>
                                </h2>
                                <div class="substatus clear">
                                    <span >收藏时间:{{$c->updated_at}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="right">
                            <a class="del" href="{{url('home/personal/recipe/recipeDetail/'.$c->rid)}}">查看详情</a>
                            <a class="del" href="{{url('home/personal/recipe/delcollect/'.$c->rid)}}">移除</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div><!-- 右侧结束 -->
    </div>

@endsection
@section('footer')
@endsection