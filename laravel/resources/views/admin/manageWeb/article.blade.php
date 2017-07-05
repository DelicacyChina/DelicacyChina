@extends('layouts.admin')
@section('crumb')
    <li><a>页面视图管理</a></li>
    <li class="'active">banner文章详情</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                Banner文章列表
            </h1>
        </div><!-- /.page-header -->
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="smaller">{{$banner->banner_title}}</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        @foreach($article as $a)
                        <dl id="dt-list-1" class="">
                            <dt>{{$a->article_title}}</dt>
                            <dd>
                                {{$a->contents}}
                                <a class="pull-right" id="dt-list-code">修改</a>
                            </dd>
                        </dl>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.nav-list > li').eq(1).attr('class','active')
        })
    </script>
@endsection