@extends('layouts.home')
@section('title','我的日志')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/myblog.css')}}">
@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
    @include('layouts.personal')
    <!-- 右侧 -->
        <div class="mod_right">
            @include('home.personal.blog.blog')
            <script>
                $('#blog').attr('class','on')
                $('#mod_location').find('a').eq(2).attr('class','on')
            </script>
            <div class="ui_newlist_1 get_num mt60 clear" id="J_list">
                @if(!isset($blogs[0]))
                    <div class="ui_no_data">
                        <p>
                            您没有审核未通过的日志！
                        </p>
                    </div>
                @else
                    <ul>
                        @foreach($blogs as $blog)
                            <li>
                                <div class='left'>
                                    <div class='detail' style='padding: 16px 0 0 16px'>
                                        <h2> <a href="{{url('home/personal/blog/editBlog/'.$blog->id)}}">{{$blog->title}}</a></h2>
                                        <p class='subline'>{{$blog->updated_at}}</p>
                                        <p style="color: red">退稿原因:{{$blog->comment}}</p>
                                    </div>
                                </div>
                                <div class='right'>
                                    <a href="{{url('home/personal/blog/editBlog/'.$blog->id)}}">编辑</a>
                                    <a href="">删除</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div><!-- 右侧结束 -->
    </div>
@endsection
@section('footer')
@endsection
