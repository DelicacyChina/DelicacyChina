@extends('layouts.home')
@section('title','首页')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/index.css')}}">
    <link rel="stylesheet" href="{{url('home/css/slicebox.css')}}">
    <link rel="stylesheet" href="{{url('home/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('home/css/jquery.bxslider.css')}}">
    <script type="text/javascript" src="{{url('home/js/modernizr.custom.46884.js')}}"></script>
    <script type="text/javascript" src="{{url('home/js/jquery.slicebox.js')}}"></script>

@endsection
@section('content')
    <div class="w logo_wrap2">
        <div class="logo_inner left">
            <a href="{{url('home/index')}}">美食天下</a>
        </div>
        <div class="logo_search right">
            <form id="form_search" method="post" >
                <div class="searchBox J_search">
                    <a href="javascript:;" class="search_Btn J_searchBTN right" >搜索</a><input type="text" id="q" class="search_Text J_searchTxt right gay" data-first="on">
                </div>
            </form>
        </div>
        <div class="logo_nav">
            <a class="on" target="_blank">首页</a>
            <a target="_blank">菜谱</a>
            <a target="_blank">食材</a>
            <a target="_blank">珍选</a>
            <a target="_blank">健康</a>
            <a target="_blank">专题</a>
            <a target="_blank">社区</a>
            <a target="_blank">话题</a>
        </div>
    </div>
    <div class="wrap">
        <div class="w clear">
            <div class="w1">

                <div id="home_index_slider">

                        <div class="wrapper">

                            <ul id="sb-slider" class="sb-slider">
                                @foreach($bans as $ban)
                                <li>
                                    <a href="{{url('home/mofang/'.$ban->id)}}" ><img src="{{$ban->banner_img}}" alt="image1"/></a>4
                                </li>
                                @endforeach
                            </ul>

                            <div id="shadow" class="shadow"></div>

                            <div id="nav-arrows" class="nav-arrows">
                                <a href="#">Next</a>
                                <a href="#" style='left: 222px';>Previous</a>
                            </div>

                        </div>

                    </div>

                <div class="w1_1">
                    <ul>
                        <li class="i1"><a class="la"><i></i>菜谱大全<b></b></a>
                            <ul class='sub'>
                                @foreach($crecipes as $crecipe)
                                <li>
                                    <a href="" target="_blank">{{$crecipe->recipe_name}}
                                        <span>看看大家在吃啥</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="i2"><a class="la"><i></i>食材大全<b></b></a>
                            <ul class='sub'>
                                @foreach($cfoods as $cfood)
                                <li>
                                    <a href="" target="_blank">{{$cfood->food_name}}
                                        <span>看看大家在吃啥</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="i3"><a class="la" target="_blank"><i></i>品质珍选<b></b></a>
                        </li>
                        <li class="i4"><a class="la" target="_blank"><i></i>专题专区<b></b></a>
                        </li>
                        <li class="i5"><a class="la" target="_blank"><i></i>一起红<b></b></a>
                        </li>
                    </ul>
                </div>
                <script>
                    $('.w1_1>ul>li').mouseover(function(){
                        $('.w1_1>ul>li').find('.sub').each(function(){
                            $(this).attr('style','display:none')
                        })
                        $(this).find('.sub').attr('style','display:block')
                    })
                    $('.w1_1>ul>li').mouseout(function(){
                        $(this).find('.sub').attr('style','display:none')
                    })
                </script>
            </div>

            <div class="w5">
                <div class="ui_title">
                    <div class="ui_title_wrap clear">
                        <h3 class="on">
                            <a href="javascript:void(0);">新秀菜谱</a>
                        </h3>
                    </div>
                </div>
                <div class="big4_list clear mt10">
                    <ul class="on">
                        @foreach($results as $result)
                        <li>
                            <a href="{{url('home/personal/recipe/recipeDetail/'.$result->id)}}">
                                <i><img class="imgLoad" src="{{$result->face}}"></i>
                                <p>{{$result->recipe_name}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w4">
                <div class="ui_title">
                    <div class="ui_title_wrap">
                        <h2 class="on">
                            <a target="_blank">时令食材</a>
                        </h2>
                    </div>
                </div>
                <div class="tui_c">
                    <ul>
                        @foreach($foods as $food)
                        <li>
                            <a target="_blank">
                                <img class="imgLoad" src="{{$food->img_url}}">{{$food->food_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w6">
                <div class="ui_title">
                    <div class="ui_title_wrap clear">
                        <h3 class="on"><a href="javascript:void(0);" id="huati">热门话题</a></h3>
                        <h3><a href="javascript:void(0);" id="jinghua">精华日志</a></h3>
                    </div>
                </div>
                <div class="pin_list clear live on" id="divhuati">
                    <ul>
                        @foreach($talks as $talk)
                        <li>
                            <div class="u">
                                <a href="{{url('home/center/index/'.$talk->uid)}}">
                                    <img width="40" height="40" class="imgLoad" src="{{$talk->icon}}">
                                </a>
                                <div>
                                    <a class="t" target="_blank">{{$talk->u_username}}</a>
                                    <span>{{$talk->updated_at}}</span>
                                </div>
                            </div>
                            <div class="c clear">
                                <div class="pp">
                                    <a href="{{url('home/personal/talk/talkDetail/'.$talk->id)}}"><strong>{{$talk->title}}</strong><br>{{$talk->content}}</a>
                                </div>
                                @if(isset($img[$talk->id]))
                                @foreach($img[$talk->id] as $value)
                                    <a class="clear"  target="_blank">
                                        <img class="imgLoad" src="{{$value}}">
                                    </a>
                                 @endforeach
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>



                <div class="big4_list big4_list2 live clear mt10" id="divjinghua" style="display:none;">
                    <ul>
                        @foreach($blogs as $blog)

                        <li>
                            <a title="" href="{{url('home/personal/blog/blogDetail').'/'.$blog->id}}" >
                                <i>
                                    @if(isset($blogimg[$blog->id]))
                                        <img alt="" class="imgLoad" src="{{$blogimg[$blog->id]['img']}}" style="display: block;">
                                    @else
                                        <img alt="" class="imgLoad" src="" style="display: block;">
                                     @endif
                                </i>
                                <p>{{$blog->title}}</p>
                            </a>
                            <a title="" href="" class="u">{{$blog->u_username}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>


        </div>
    </div>
    <script type="text/javascript">
                $(function() {
                    var Page = (function() {
                        var timer;
                        var $navArrows = $( '#nav-arrows' ).hide(),
                            $shadow = $( '#shadow' ).hide(),
                            slicebox = $( '#sb-slider' ).slicebox( {
                                onReady : function() {

                                    $navArrows.show();
                                    $shadow.show();

                                },
                                orientation : 'r',
                                cuboidsRandom : true,
                                disperseFactor : 30
                            } )

                        init = function() {
                            autoplay();
                            initauto();
                            initnext();
                            initprev();
                            stopplay();
                        }
                        autoplay = function(){
                            timer = setInterval('initauto()',2000);
                        }
                        initauto = function() {

                            // add navigation events
                            // $navArrows.children( ':first' ).on( 'click', function() {

                            slicebox.next();
                            return false;

                            // } );


                        }
                        initnext = function() {

                            // add navigation events
                            $navArrows.children( ':first' ).on( 'click', function() {

                                slicebox.next();
                                return false;

                            } );


                        }
                        initprev = function() {
                            $navArrows.children( ':last' ).on( 'click', function() {

                                slicebox.previous();
                                return false;

                            } );
                        }


                        stopplay = function(){
                            $('#sb-slider').mouseover(function(){
                                clearInterval(timer);
                            }).mouseout(function(){
                                autoplay();
                            })
                        }
                        // setInterval('initEvents', 2000);


                        return { init : init };

                    })();

                    Page.init();


                });
                $('#jinghua').click(function () {
                    $('#huati').parent().removeClass('on');
                    $('#jinghua').parent().addClass('on');
                    $('#divjinghua').css('display','block');
                    $('#divhuati').css('display','none');
                })

                $('#huati').click(function () {
                    $('#jinghua').parent().removeClass('on');
                    $('#huati').parent().addClass('on');
                    $('#divhuati').css('display','block');
                    $('#divjinghua').css('display','none');

                })
    </script>
@endsection
