@extends('layouts.home')
@section('title','私信')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/sixin.css')}}">
@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
    @include('layouts.personal')

    <!-- 右侧 -->
        <div class="mod_right">
            @include('home.personal.letter.letter')
            <script>
                $('#letter').attr('class','on')
                $('.mod_location').find('a').eq(1).attr('class','on')
            </script>
            <div class="sixin_list mt60 clear">
                <span style="font-size: 20px">
                    <a class="on">您共有{{array_sum($count)}}条系统消息</a>,
                    <a>已读{{$count[1]}}</a>,
                    <a>未读{{$count[0]}}</a>
                </span>
            </div>

            <div class="news-box-list clearfix" id="allLetter">
                <ul class="news-list-wrap">
                    <h2>所有系统消息</h2>
                    @foreach($letters as $result)
                        <li class="news-list-item clearfix ">
                            <div class="news-list-item-wrap">
                                <span class="news-type news-app6">来自:<span style="color:red">美食中国</span>的消息</span>&nbsp;&nbsp;&nbsp;
                                <a href="{{url('home/personal/letter/detail/'.$result->id)}}"  class="news-list-item-content cut-string" title="">{{$result->content}}</a>
                                <div class="news-list-item-right">
                                    <span class="news-list-item-time">{{$result->updated_at}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{url('home/personal/letter/del/'.$result->id)}}" class=" .news-list-item-right-btn">删除</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="news-box-list clearfix" id="readLetter" style="display: none">
                <ul class="news-list-wrap">
                    <h2>已读系统消息</h2>
                    @foreach($letters as $result)
                        @if($result->status == 1)
                            <li class="news-list-item clearfix ">
                                <div class="news-list-item-wrap">
                                    <span class="news-type news-app6">来自:<span style="color:red">美食中国</span>的消息</span>&nbsp;&nbsp;&nbsp;
                                    <a href="{{url('home/personal/letter/detail/'.$result->id)}}"  class="news-list-item-content cut-string" title="">{{$result->content}}</a>
                                    <div class="news-list-item-right">
                                        <span class="news-list-item-time">{{$result->updated_at}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{url('home/personal/letter/del/'.$result->id)}}" class=" .news-list-item-right-btn">删除</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="news-box-list clearfix" id="notReadLetter" style="display: none">
                <ul class="news-list-wrap">
                    <h2>未读系统消息</h2>
                    @foreach($letters as $result)
                        @if($result->status == 0)
                            <li class="news-list-item clearfix ">
                                <div class="news-list-item-wrap">
                                    <span class="news-type news-app6">来自:<span style="color:red">美食中国</span>的消息</span>&nbsp;&nbsp;&nbsp;
                                    <a href="{{url('home/personal/letter/detail/'.$result->id)}}"  class="news-list-item-content cut-string" title="">{{$result->content}}</a>
                                    <div class="news-list-item-right">
                                        <span class="news-list-item-time">{{$result->updated_at}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{url('home/personal/letter/del/'.$result->id)}}" class=" .news-list-item-right-btn">删除</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div><!-- 右侧结束 -->
    </div>
    <script>
        $('.sixin_list').find('a').each(function(){
            $(this).click(function(){
                $('.news-box-list').each(function(){
                    $(this).hide();
                })
                $('.news-box-list').eq($(this).index()).show()
            })
        })
    </script>
@endsection
@section('footer')
@endsection