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
                $('#mod_location').find('a').eq(0).attr('class','on')
            </script>
            <div class="ui_newlist_1 get_num mt60 clear" id="J_list">
                @if(!isset($blogs[0]))
                    <div class="ui_no_data">
                        <p>
                            您还没有发布新日志噢，快点击这里<a href="{{url('home/personal/blog/add')}}" >发布新日志</a>吧！
                        </p>
                    </div>
                @else
                    <ul>
                    @foreach($blogs as $blog)
                        <li>
                            <div class='left'>
                                <div class='detail' style='padding: 16px 0 0 16px'>
                                    <h2><a href="{{url('home/personal/blog/blogDetail/'.$blog->id)}}">{{$blog->title}}</a></h2>
                                    <p class='subline'>{{$blog->updated_at}}</p>
                                    <div class='substatus clear'>
                                        <span class='get_nums' style='display: none;'>0次阅读</span>
                                    </div>
                                </div>
                            </div>
                            <div class='right'>
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
