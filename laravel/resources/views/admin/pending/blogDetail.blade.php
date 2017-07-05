@extends('layouts.admin')
@section('crumb')
    <li><a>审核管理</a></li>
    <li class="'active">日志审核</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                日志审核
            </h1>
        </div><!-- /.page-header -->
        <div class="col-xs-6">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="smaller">{{$blog->recipe_name}}</h4>

                    <div class="widget-toolbar">
                        <label>
                            <small class="green">
                                <b> 作者:{{$user->u_username}}</b>
                            </small>
                        </label>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <dl id="dt-list-1">
                            <dt>图片</dt>
                            @if(isset($blog_img[0]))
                                @foreach($blog_img as $f)
                                    <dd> <img alt="150x150" src="{{$f->img}}" style="margin-top: 5px"></dd>
                                @endforeach
                            @else
                                <dd>暂无图片</dd>
                            @endif
                            <dt>内容</dt>
                            <dd>
                                <dd>{!! $blog->content !!}</dd>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="smaller">审核人:{{Auth::guard('admin')->user()->a_username}}</h4>
                </div>
                <div class="widget-body">
                    <form class="widget-main" method="post" action="{{url('admin/pending/blog/pending')}}">
                        <label>审核意见</label>
                        {{csrf_field()}}
                        <input type="hidden" name="rid" value="{{$blog->id}}">
                        <input type="hidden" name="uid" value="{{$user->id}}">
                        <select name="suggest">
                            <option value="通过" selected>通过</option>
                            <option value="内容不充实">内容不充实</option>
                            <option value="恶意灌水">恶意灌水</option>
                            <option value="三观不正">三观不正</option>
                            <option value="其他">其他</option>
                        </select>
                        <div class="space-4"></div>
                        <textarea rows="3" cols="50" style="display: none"></textarea>
                        <br>
                        <input type="submit" value="保存">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function(){
            $('.nav-list > li').eq(3).attr('class','active')
            $('dd').each(function(){
                $(this).attr('style','text-indent:2em')
            })
            $('select').change(function()
            {
                if($(this).find('option:selected').val() == '其他'){
                    $('textarea').attr('style','display:block')
                } else {
                    $('textarea').attr('style','display:none')
                }
            })
        })
    </script>
@endsection