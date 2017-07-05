@extends('layouts.home');
@section('title','查看日志')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/blog.css')}}">
    <script src="http://cdn.bootcss.com/ckeditor/4.5.11/ckeditor.js"></script>
    <style>
        .m{ width: 1030px; margin-top: 20px; }
    </style>

@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
        @include('layouts.personal')
        <script>
            $('#blog').attr('class','on')
        </script>
        <div class="mod_right">
            <div id="mod_location">
                <div class="mod_location clear">
                    <div class="left">
                        <a href="{{url('home/personal/blog/blogPending')}}" title="回到我的日志" class="return"> </a>
                        查看日志
                    </div>
                </div>
            </div>

            <div class="mr_edit mr_edit_center clear">
                <ul>
                    <li>
                        <label class="must">日志标题</label><br>
                        <input name="title" class="inputL" type="text" id="J_subject" value="{{$blog->title}}" disabled>
                    </li>
                    <div id="cover" class="clear">
                        @if(isset($img[0]))
                            @foreach($img as $i)
                                <img src="{{$i->img}}" width="160" height="100" />
                            @endforeach
                        @endif
                    </div>
                    <li>
                        <label class="must">日志正文</label><br>
                        <div class="m">
                            <textarea rows="30" cols="50" name="content" disabled>
                                 {!! $blog->content !!}
                            </textarea>
                            <script type="text/javascript">CKEDITOR.replace('content');</script>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- 右侧结束 -->
    </div>
@endsection
@section('footer')
@endsection