@extends('layouts.home')
@section('title','个人空间-菜谱')
@section('css')

@endsection
@section('content')
    <!-- 主框架 -->
    @include('home.personal.center.comment')
    <script>
        $('#pai').addClass('on')
    </script>

    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="ui_title mt10">
                    <div class="ui_title_wrap clear">
                        <h3 class="on">{{$user->u_username}}的话题</h3>
                        <span class="right">共{{$talkscount}}个</span>
                    </div>
                </div>
                <div class="pin_list clear" id="J_list">
                    <ul>
                        @foreach($talks as $talk)
                            <li>
                                <div class="u">
                                    <a href="">
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


                <div class="ui-page-inner">
                    {{$talks->links()}}
                </div>
            </div>

        </div>
    </div>



@endsection