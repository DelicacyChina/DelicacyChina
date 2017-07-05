@extends('layouts.home')
@section('title','话题评论')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/talkdetail.css')}}">
@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}" title="美食天下">美食天下</a>
        </div>
        <div class="logo_current left">
            <h1><a href="http://home.meishichina.com/" title="社区">社区</a></h1>
        </div>
        <div class="logo_nav">
            <a href="" title="社区广场">社区广场<i></i><b></b></a>
            <a class="on" href="" title="话题">话题<i></i><b></b></a>
            <a href="" title="日志">日志<i></i><b></b></a>
            <a href="" title="活动">活动<i></i><b></b></a>
        </div>
    </div>
    <div class="nav_wrap2">
        <ul>
            <li><a href="" title="全部">全部</a></li>
            <li><a href="" title="美食随手拍">美食随手拍</a></li>
            <li><a href="" title="烘焙圈">烘焙圈</a></li>
            <li><a href="" title="妈妈派">妈妈派</a></li>
            <li><a href="" title="饮食健康">饮食健康</a></li>
            <li><a href="" title="厨艺交流">厨艺交流</a></li>
            <li><a href="" title="最美之物">最美之物</a></li>
            <li><a href="" title="美好时光">美好时光</a></li>
            <li><a href="" title="帮助与反馈">帮助与反馈</a></li>
        </ul>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="ui_title">
                    <div class="ui_title_wrap clear ">
                        <h2 class="on">美食随手拍</h2>
                        <a title="精华" href="" class="right" rel="nofollow">精华</a>
                        <a title="热门" href="" class="right" rel="nofollow">热门</a>
                        <a title="最新" href="" class="right">最新</a>
                        <a title="全部" href="" class="right">全部</a>
                    </div>
                </div>
                <div class="pai_box">
                    <a class="img" href="{{url('home/center/index/'.$res->userid)}}">
                        <img src="{{$res->icon}}" class="imgLoad"  width="48" height="48"></a>
                    <p class="u">
                        <a href="{{url('home/center/index/'.$res->userid)}}" class="t">{{$res->u_username}}</a>　　
                        {{$res->time}}
                    </p>
                    <p class="c">
                        <strong>{{$res->title}}</strong>
                        <input type="hidden" id="evaluateID" value="{{$res->tid}}">
                        <br>
                        <span class="subject">{{$res->content}}</span>
                    <div class="pic">
                        @if($d != '')
                            @foreach($d as $img)
                                <img src="{{$img}}" class="imgLoad">
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="recipeArction mt10 clear">
                    <ul class="collect_da">
                        <li class="lik">
                            <a title="喜欢" href="javascript:void(0);" class="J_lik  " data=""><i></i><span>0</span>人喜欢</a>
                        </li>
                        <li class="fav">
                            <a title="收藏" href="javascript:void(0);" class="J_fav  " data=""><i></i><span>0</span>人收藏</a>
                        </li>
                        <li style="width:1px;border-right: 1px solid #ddd; height: 30px; margin: 2px 10px; overflow: hidden;"></li>
                        <li class="shar">
                            <a title="分享到微信" href="javascript:void(0);" class="J_s4" data="bds_weixin"><i></i>微信</a>
                        </li>
                        <li class="shar">
                            <a title="分享到QQ好友" href="javascript:void(0);" class="J_s2" data="bds_sqq"><i></i>QQ好友</a>
                        </li>
                        <li class="shar">
                            <a title="分享到QQ空间" href="javascript:void(0);" class="J_s3" data="bds_qzone"><i></i>QQ空间</a>
                        </li>
                        <li class="shar">
                            <a title="分享到新浪微博" href="javascript:void(0);" class="J_s1" data="bds_tsina">
                                <i></i>新浪微博
                            </a>
                        </li>
                    </ul>
                    <div class="bdsharebuttonbox" id="bdshare">
                        <a title="分享到新浪微博" href="#" class="bds_tsina" id="bds_tsina" data-cmd="tsina"></a><a title="分享到QQ空间" href="#" class="bds_qzone" id="bds_qzone" data-cmd="qzone"></a><a title="分享到QQ好友" href="#" class="bds_sqq" id="bds_sqq" data-cmd="sqq"></a><a data-cmd="weixin" id="bds_weixin" class="bds_weixin" href="#"></a>
                    </div>
                </div>
                <div id="comment">
                    <div class="comment-wrap clear" data-dom="wrap">
                        <div class="comment-list ">
                            <div data-dom="list">
                                <ul style="">
                                    @foreach($evaluates as $e)
                                    <li>
                                        <div class="pic">
                                            <a target="_blank" href="">
                                                <img height="48" width="48" src="{{$e->icon}}" class="imgLoad">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <div class="tools">
                                                <div class="left">
                                                    <a href="" id="user" title="用户">{{$e->u_username}}</a>
                                                    <span class="subtime">{{$e->time}}</span>
                                                    <div class="right" style="margin-left: 300px">
                                                        <span class="floor">1#</span>
                                                        {{--<a class="reply" href="javascript:void(0);">回复</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                {{$e->content}}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="comment-pai">
                            @if(Auth::check())
                            <img src="{{$user==null?'':$user->icon}}" class="imgLoad comment-pai-img" width="48" height="48" style="display: block;">
                            <div data-dom="add" class="comment-post comment-add">
                                <div class="comment-post-text">
                                    <div class="comment-post-text-inner">
                                        <textarea title="" class="text ui-webkit-scrollbar">内容</textarea>
                                    </div>
                                </div>
                                <div class="comment-post-tools clear">
                                    <div class="right">
                                        <a class="comment-btn add_submit" href="javascript:void(0);" id="evaluate">发表评论</a>
                                    </div>
                                </div>
                            </div>
                            @else
                                <img src="http://static.meishichina.com/u2/res/noavatar_small.jpg" class="comment-pai-img">
                                <div data-dom="add" class="comment-post comment-add">
                                    <div title="请先登录" class="comment-login"></div>
                                    <div title="请先登录" class="comment-login-text">
                                        <a class="J_event" href="{{url('home/login')}}">登录</a>后参与讨论，发表评论</div>
                                    <div class="comment-post-loading"></div>
                                    <div class="comment-post-text">
                                        <div class="comment-post-text-inner">
                                            <textarea title="Ctrl+Enter 也可提交哦" class="text ui-webkit-scrollbar"></textarea>
                                        </div>
                                    </div>
                                    <div class="comment-post-tools clear">
                                        <div class="right">
                                            <a class="comment-btn add_submit" href="javascript:void(0);" data-id="781370">发表评论</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="space_right">
                <a class="r_pai-add" href="{{url('home/personal/talk/addTalk')}} " title="发布话题">发布话题</a>
            </div>
        </div>
    </div>
    <script>
        $('#evaluate').click(function(){
            var tid = $('#evaluateID').val();
            var content = $('textarea').val();
            $.ajax({
                url:'{{url("home/personal/talk/talkEvaluate")}}',
                type:'get',
                data:{tid:tid,content:content},
                dataType:'json',
                success:function (data) {
                    alert('回复成功')
                    window.location.reload();
                }
            })
        })
        $(function(){
            var i = 0;
            $('.floor').each(function(){
                i++;
                $(this).html(i+'#')
            })
        })
    </script>
@endsection
