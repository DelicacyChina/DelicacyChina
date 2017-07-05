@extends('layouts.home')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/all.css')}}">

@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}" title="美食天下">美食天下</a>
        </div>
        <div class="logo_current left">
            <h1><a href="" title="社区">社区</a></h1>
        </div>
        <div class="logo_search right">
            <form id="form_search" action="" method="post" target="_blank">
                <div class="searchBox J_search"><a href="javascript:;" title="搜索" class="search_Btn J_searchBTN right" id="search">搜索</a><input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
                </div>
            </form>
        </div>
        <div class="logo_nav">
            <a href="" title="社区广场">社区广场<i></i><b></b></a>
            <a href="" title="话题">话题<i></i><b></b></a>
            <a class="on" href="" title="日志">日志<i></i><b></b></a>
            <a href="" title="活动">活动<i></i><b></b></a>
        </div>
    </div>
    <div class="w nav_wrap2">
        <ul>
            <li><a href="">精华日志</a></li>
            <li><a href="">最新日志</a></li>
        </ul>
    </div>
    <div class="w mt10 clear">
        <iframe width="100%" height="90" frameborder="0" scrolling="no" src="http://static.meishichina.com/v3/t1_1.html"></iframe>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="userTop clear">
                    <h1><a id="blog_title" href="">{{$blog->title}}</a></h1>
                    <a class="uright" href="{{url('home/center/index/'.$blog->userid)}}" title="{{$blog->u_username}}">
                        @if(isset($blog->icon))
                            <img src="{{url($blog->icon)}}">
                        @else
                            <img src="">
                        @endif
                        <span id="blog_username" class="userName">{{$blog->u_username}}</span>
                    </a>
                    <span class="rtime"><span class="jinghua">精华</span> 发表于{{$blog->time}}</span>
                </div>
                <div class="blog_message mt20">
                    @if(isset($img[0]))
                        @foreach($img as $i)
                            <p><img src="{{$i->img}}" style="float:none;"></p>
                        @endforeach
                    @endif
                    {!! $blog->content !!}
                </div>
                <div class="mo mt10">
                    <h3>{{$blog->u_username}}推荐的日志</h3>
                </div>
                <ul class="blog_shares clear">
                    <li><a href="{{url('home/center/blog/'.$blog->userid)}}">{{$blog->u_username}}的所有日志</a></li>
                </ul>
                <div class="recipeArction mt10 clear">
                    <ul class="collect_da">
                        <li class="lik"><a title="喜欢" href="javascript:void(0);" class="J_lik" like-on="off"><i></i><span>{{$count}}</span>人喜欢</a></li>
                        <li style="width:1px;border-right: 1px solid #ddd; height: 30px; margin: 2px 10px; overflow: hidden;"></li>
                        <li class="shar" id="btn"><a title="分享到新浪微博" href="javascript:void(0);" class="J_s1" data="bds_tsina"><i></i>新浪微博</a ></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
    $('#btn').click(function(){
    window.sharetitle = $(this).siblings('p').html();
    window.shareUrl = $(this).siblings('img').attr('src');
    share();
    });
    function share(){
        //d指的是window
        (function(s,d,e){
            try{}
            catch(e){}
            var f='http://v.t.sina.com.cn/share/share.php?'
            var u=d.location.href
            var p=['url=',e(u),'&title=',e(window.sharetitle),'&appkey=2924220432','&pic=',e(window.shareUrl)].join('');
            function a(){
                if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join('')))
                    u.href=[f,p].join('');
            };
            if(/Firefox/.test(navigator.userAgent)) {
                setTimeout(a,0)
            } else {
                a()
            }
        })(screen,document,encodeURIComponent);
    }
    </script>
    <script>
        var flag = "{{$flag}}"
        if(flag){
            $('.J_lik').attr('like-on','on')
            $('.J_lik').addClass('on')
        }
        $('.lik').on('click','.J_lik',function(){
            var bid = "{{$blog->bid}}"
            console.log(bid)
            var n = parseInt($(this).find('span').html())
            if($(this).attr('like-on')=='off'){
                $.ajax({
                    url:'/home/personal/blog/like',
                    data:{bid:bid},
                    type:'get',
                    success:function(data){
                        if(data==1){
                            alert('喜欢啦~~~')
                            n++;
                            $('.J_lik').find('span').html(n);
                            $('.J_lik').attr('like-on','on')
                            $('.J_lik').addClass('on')
                        } else {
                            alert('请先登录')
                        }

                    },

                })
            } else {
                $.ajax({
                    url: '/home/personal/blog/delLike',
                    data: {bid: bid},
                    type: 'get',
                    success: function () {
                        alert('再见了,我的小主~~~')
                        n--;
                        $('.J_lik').find('span').html(n);
                        $('.J_lik').attr('like-on','off')
                        $('.J_lik').removeClass('on')
                    }
                })
            }
        })
    </script>
@endsection