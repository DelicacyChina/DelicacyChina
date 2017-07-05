@extends('layouts.home')
@section('title','个人空间-菜谱')
@section('css')

@endsection
@section('content')
    <!-- 主框架 -->
    @include('home.personal.center.comment')
    <script>
        $('#blog').addClass('on')
    </script>

    <div class="wrap">
        <div class="w clear">
            <div class="ui_title mt10">
                <div class="ui_title_wrap clear">
                    <h3 class="on">{{$user->u_username}}的日志</h3>
                    <a target="_blank" class="right" href="">{{$blogscount}}篇数</a>
                </div>
            </div>

            <div class="big4_list big4_list2 live clear mt10" id="divjinghua" style="display:block;">
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
                            <a title="叶子的小厨" href="" target="_blank" class="u">{{$blog->u_username}}</a>
                        </li>
                    @endforeach
                </ul>

            </div>


            <div class="ui-page-inner">

                {{$blogs->links()}}
            </div>
        </div>
    </div>

@endsection