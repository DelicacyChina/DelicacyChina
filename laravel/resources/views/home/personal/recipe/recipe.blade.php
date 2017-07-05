@extends('layouts.home')
@section('title','菜谱')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/editRecipe.css')}}">
    <link rel="stylesheet" href="{{url('home/css/1.css')}}">
    <style>
        .ui_subsort{font-size:14px;padding:0 0 5px 0;}
        .ui_subsort a.on{color:#ff6767}
    </style>
@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
        @include('layouts.personal');
        <!-- 右侧 -->
        <div class="mod_right">
           @include('layouts.recipe')
            <script>
                $('#recipe').attr('class','on');
                $('#mod_location').find('a').eq(0).attr('class','on');
            </script>
            @if(!isset($recipes[0]))
            <div class="ui_no_data">
                <p>
                    您还没有创建新菜单噢，快点击这里<a href="{{url('/home/personal/recipe/addRecipe')}}">创建新菜谱</a>吧！
                </p>
            </div>
            @else
                <div class="ui_newlist_1 get_num mt60 clear" id="J_list">
                    <ul>
                        @foreach($recipes as $r)
                            <li>
                                <div class="left">
                                    <div class="pic">
                                        <a href="">
                                            <img class="imgLoad" src="{{$r->face}}" width="180" height="180" style="display: block;">
                                        </a>
                                    </div>

                                    <div class="detail">
                                        <h2>
                                            <a title="hongsaorou" href="{{url('home/personal/recipe/recipeDetail/'.$r->id)}}">{{$r->recipe_name}}</a>
                                        </h2>
                                        <p class="subline">{{$r->updated_at}}</p>

                                    </div>
                                </div>
                                <div class="right">
                                    <a class="del" href="{{url('/home/personal/collect/delCollect/'.$r->id)}}">删除</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div><!-- 右侧结束 -->
    </div>
@endsection
@section('footer')
@endsection






