@extends('layouts.home')
@section('title','问答')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/talkdetail.css')}}">
    <script src="{{url('assets/js/jquery.tmpl.js')}}"></script>
@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}" title="美食天下">美食天下</a>
        </div>
        <div class="logo_current left">
            <h1><a href="{{url('home/question')}}" title=" 问答">问答</a></h1>
        </div>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="ui_title">
                    <div class="ui_title_wrap clear ">
                        <h2 class="on">问答</h2>
                    </div>
                </div>
                <div id="comment">
                    <div class="comment-wrap clear" data-dom="wrap">
                        <div class="comment-list ">
                            <div data-dom="list">
                                <ul style="">

                                </ul>
                            </div>
                        </div>
                        <div class="comment-pai">
                            @if(Auth::check())
                                <img src="{{$user->icon or null}}" class="imgLoad comment-pai-img" width="48" height="48" style="display: block;">
                                <div data-dom="add" class="comment-post comment-add">
                                    <div class="comment-post-text">
                                        <div class="comment-post-text-inner">
                                            <textarea title="" class="text ui-webkit-scrollbar">内容</textarea>
                                        </div>
                                    </div>
                                    <div class="comment-post-tools clear">
                                        <div class="right">
                                            <a class="comment-btn add_submit" href="javascript:void(0);" id="evaluate">进行提问</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <img src="http://static.meishichina.com/u2/res/noavatar_small.jpg" class="comment-pai-img">
                                <div data-dom="add" class="comment-post comment-add">
                                    <div title="请先登录" class="comment-login"></div>
                                    <div title="请先登录" class="comment-login-text">
                                        <a class="J_event" href="{{url('home/login')}}">登录</a>后参与讨论，进行提问</div>
                                    <div class="comment-post-loading"></div>
                                    <div class="comment-post-text">
                                        <div class="comment-post-text-inner">
                                            <textarea title="Ctrl+Enter 也可提交哦" class="text ui-webkit-scrollbar"></textarea>
                                        </div>
                                    </div>
                                    <div class="comment-post-tools clear">
                                        <div class="right">
                                            <a class="comment-btn add_submit" href="javascript:void(0);" data-id="781370">进行提问</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/html" id="box">
        <li>
            <div class="detail">
                <div class="tools">
                    <div class="left">
                        <a href="" id="user" title="用户">{{Auth::user()->u_username}}</a>
                        <span class="subtime">{{date('Y-m-d h:i:s',time())}}</span>
                        <div class="right" style="margin-left: 300px">
                            <span class="floor">${n}#</span>
                        </div>
                    </div>
                </div>
                <div class="content">${content}</div>
            </div>
        </li>
    </script>
    <script>
        $('#evaluate').click(function(){
            var tid = $('#evaluateID').val();
            var content = $('textarea').val();
            $.ajax({
                url:'http://api.jisuapi.com/iqa/query',
                type:'get',
                data:{appkey:'eb5eaa404c272bab',question:content},
                dataType:'jsonp',
                success:function (data) {
                    alert('提交成功')
                    data = data.result;
                    var n =   $('#comment').find('li').length + 1
                    info = {content:data.content,n:n}
                    $('#box').tmpl(info).appendTo($('#comment').find('ul')[0])
                }
            })
        })
    </script>
@endsection
