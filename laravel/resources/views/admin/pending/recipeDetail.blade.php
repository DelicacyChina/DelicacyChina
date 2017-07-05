@extends('layouts.admin')
@section('crumb')
    <li><a>审核管理</a></li>
    <li class="'active">菜谱审核</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                菜谱审核
            </h1>
        </div><!-- /.page-header -->
        <div class="col-xs-6">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="smaller">{{$recipe->recipe_name}}</h4>

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
                            <dt>简介</dt>
                            @if(isset($recipe->introduction))
                                <dd>{{$recipe->introduction}}</dd>
                            @else
                                <dd>暂无简介</dd>
                            @endif
                            <dt>封面</dt>
                            <dd><img alt="150x150" src="{{$recipe->face}}"></dd>
                            <dt>材料</dt>
                            <dd>主材:
                                @foreach($recipe_food as $f)
                                    @if($f->status == 1)
                                        {{$f->food_name}}
                                        @if($f->weight == null)
                                            (适量);
                                        @else
                                            {{'('.$f->weight.');'}}
                                        @endif
                                    @endif
                                @endforeach
                            </dd>
                            <dd>辅材:
                                @foreach($recipe_food as $f)
                                    @if($f->status == 2)
                                        {{$f->food_name}}
                                        @if($f->weight == null)
                                            (适量);
                                        @else
                                            {{'('.$f->weight.');'}}
                                        @endif
                                    @endif
                                @endforeach
                            </dd>
                            <dt>步骤</dt>
                            @foreach($recipe_option as $op)
                                <img alt="150x150" src="{{$op->img}}" style="margin:5px 0 2px 20px">
                                <dd>
                                    {{$op->describe}}
                                </dd>
                            @endforeach
                            <dt>Tips:</dt>
                            @if($recipe->tips != null)
                                <dd>{{$recipe->tips}}</dd>
                            @else
                                <dd>暂无Tips</dd>
                            @endif
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
                    <form class="widget-main" method="post" action="{{url('admin/pending/recipe/pending')}}">
                        <label>审核意见</label>
                        {{csrf_field()}}
                        <input type="hidden" name="rid" value="{{$recipe->id}}">
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