@extends('layouts.home')
@section('title','好友')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/friends.css')}}">
@endsection
@section('content')
    @include('home.personal.center.comment')
    <script>
        $('#friend').addClass('on')
    </script>
    <div class="wrap">
        <div class="w clear">
            <div class="space_left">
                <div class="ui_title mt10">
                    <div class="ui_title_wrap">
                        <h3 class="on">{{$user->u_username}}的好友列表</h3>
                    </div>
                </div>

                <div class="space_left">
                    <div class="u_list_2_48 clear">
                        <ul>
                            @foreach($friends as $result)
                                <li>
                                    <a title="{{$result->u_username}}" href="{{url('home/center/index/'.$result->fid)}}">
                                        <img src="{{$result->icon}}" class="imgLoad" width="48" height="48">{{$result->u_username}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection