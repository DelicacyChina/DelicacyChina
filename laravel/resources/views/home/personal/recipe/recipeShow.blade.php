@extends('layouts.home');
@section('title','查看菜谱')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/editRecipe.css')}}">
    <link rel="stylesheet" href="{{url('home/css/1.css')}}">
    <script src="{{url('assets/js/jquery.tmpl.js')}}"></script>

@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
    @include('layouts.personal')
    <!-- 右侧 -->
        <form action="{{url('/home/personal/recipe/add')}}" method="post" enctype="multipart/form-data">
            <div class="mod_right">
                <div id="mod_location">
                    <div class="mod_location clear">
                        <div class="left">
                            <a href="#" onclick="self.location=document.referrer;" title="回到我的菜谱" class="return"> </a>
                            查看菜谱
                        </div>
                    </div>
                </div>
                <div class="mr_edit mr_edit_center clear">
                    <ul>
                        {{csrf_field()}}
                        <li>
                            <label class="must">菜谱名称</label><br>
                            <input name="recipe_name" class="inputL color_5b" type="text" value="{{$recipe->recipe_name}}" disabled>
                        </li>
                        <li>
                            <label class="must">成品图片（最多9张）</label><br>
                            <div class="J_uploadflash">上传成品图<div id="J_uploadflash"></div></div>

                            <span class="tip" id="multi_cover_status"> </span>
                            <div id="cover" class="clear">
                                <img src="{{$recipe->face}}">
                            </div>
                        </li>
                        <li>
                            <textArea class="J_input" name="message" disabled>{{$recipe->introduction}}</textArea>
                        </li>
                        <li  class="options clear">
                            <label class="must">基本参数</label><br>
                            <div class='multiselect select_0' style='width:133px'>
                                <a tar="level" href="javascript:;" check="false" class="multi_txt multi_0" title="难度">{{$recipe->nd}}</a>
                                <ul class='ul_show' style='display:none'>
                                    @foreach($nandus as $n)
                                        <li>
                                            <a href="javascript:;">
                                                <label class='J_radio'>
                                                    <input type="radio" name='nd' value='{{$n->recipe_name}}' {{$recipe->nd == $n->recipe_name?'checked':''}} disabled>{{$n->recipe_name}}
                                                </label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class='multiselect select_0' style='width:133px'>
                                <a tar="level" href="javascript:;" check="false" class="multi_txt multi_0" title="难度">{{$recipe->kw}}</a>
                                <ul class='ul_show' style='display:none'>
                                    @foreach($kouweis as $k)
                                        <li>
                                            <a href="javascript:;">
                                                <label class='J_radio'>
                                                    <input type="radio" name='kw' value='{{$k->recipe_name}}' {{$recipe->kw == $k->recipe_name?'checked':''}} disabled>{{$k->recipe_name}}
                                                </label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class='multiselect select_0' style='width:133px'>
                                <a tar="level" href="javascript:;" check="false" class="multi_txt multi_0" title="难度">{{$recipe->gy}}</a>
                                <ul class='ul_show' style='display:none'>
                                    @foreach($gongyis as $g)
                                        <li>
                                            <a href="javascript:;">
                                                <label class='J_radio'>
                                                    <input type="radio" name='gy' value='{{$g->recipe_name}}' {{$recipe->gy == $g->recipe_name?'checked':''}} disabled>{{$g->recipe_name}}
                                                </label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class='multiselect select_0' style='width:133px'>
                                <a tar="level" href="javascript:;" check="false" class="multi_txt multi_0" title="难度">{{$recipe->hs}}</a>
                                <ul class='ul_show' style='display:none'>
                                    @foreach($shijians as $h)
                                        <li>
                                            <a href="javascript:;">
                                                <label class='J_radio'>
                                                    <input type="radio" name='hs' value='{{$h->recipe_name}}' {{$recipe->hs == $h->recipe_name?'checked':''}} disabled>{{$h->recipe_name}}
                                                </label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class='multiselect select_0' style='width:133px'>
                                <a tar="level" href="javascript:;" check="false" class="multi_txt multi_0" title="难度">{{$recipe->cj}}</a>
                                <ul class='ul_show' style='display:none'>
                                    @foreach($chujus as $c)
                                        <li>
                                            <a href="javascript:;">
                                                <label class='J_radio'>
                                                    <input type="radio" name='cj' value='{{$c->recipe_name}}' {{$recipe->cj == $c->recipe_name?'checked':''}} disabled>{{$c->recipe_name}}
                                                </label>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="ingredient clear">
                            <blockquote class="Left">
                                <label class="must">食材明细（主料）</label>
                                @foreach($recipe_foods as $f)
                                    @if($f->status == 1)
                                        <div>
                                            <input type="text" name="food1[]" class="zhuliao btn37 J_input"  value="{{$f->food_name}}" autocomplete="off">
                                            <input type="text" name="food2[]" class="yongliang btn37 J_input" placeholder="{{$f->weight}}" autocomplete="off">
                                        </div>
                                    @endif
                                @endforeach
                            </blockquote>

                            <blockquote class="Right">
                                <label>食材明细（辅料）</label>
                                @foreach($recipe_foods as $f)
                                    @if($f->status == 2)
                                        <div>
                                            <input type="text" name="food3[]" class="zhuliao btn37 J_input"  value="{{$f->food_name}}" autocomplete="off">
                                            <input type="text" name="food4[]" class="yongliang btn37 J_input" placeholder="{{$f->weight}}" autocomplete="off">
                                        </div>
                                    @endif
                                @endforeach
                            </blockquote>
                        </li>
                        <li class="step">
                            <label class="must">做法步骤</label><br>
                            <div class="multi_step">批量上传<div id="multi_step"></div></div>
                            <span class="tip" id="multi_step_status"></span>
                            <div id="dragsort">
                                @foreach($recipe_ops as $op)
                                    <blockquote class="cp_block J_blockQ clear">
                                        <div id="addCommodityIndex" style="float:left;">
                                            <div class="input-group row">
                                                <div class="col-sm-9 big-photo">
                                                    <div id="preview">
                                                        <img id="imghead" name="img1" border="0" src="{{$op->img}}" width="215" height="158">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="right">
                                            <input type="hidden" value="" name="stepid">
                                            <textArea class="textArea J_input" name="note[]" disabled>{{$op->describe}}</textArea>
                                            <span class="J_step_num">1、</span>
                                        </div>
                                    </blockquote>
                                @endforeach
                            </div>
                        </li>

                        <li>
                            <label>小窍门</label><br>
                            <textarea class="color_5b" name="tips" id="tips"  disabled>{{$recipe->tips}}</textarea>
                        </li>
                    </ul>
                </div>
            </div><!-- 右侧结束 -->
        </form>
    </div>

    <script type="text/javascript">

        $('.multiselect').each(function () {
            $(this).mouseover(function(){
                $(this).find('ul').attr('style','display:block')
            })
            $(this).find('ul').change(function(){
                $(this).prev().html($(this).find('input[type=radio]:checked').val())
            })
            $(this).mouseout(function(){
                $(this).find('ul').attr('style','display:none')
            })
        })


        // 遍历每一个
        $(function(){
            $('#dragsort').find('blockquote').each(function(){
                $(this).find('input[type=file]').each(function(){
                    var n = $(this).parent().parent().parent().parent().index()
                    $(this).attr('name','file'+n)
                })
                $(this).find('.J_step_num').each(function(){
                    var n = $(this).parent().parent().index();
                    n++;
                    $(this).html(n+'、')
                })
            })
        })
    </script>
@endsection
@section('footer')
@endsection