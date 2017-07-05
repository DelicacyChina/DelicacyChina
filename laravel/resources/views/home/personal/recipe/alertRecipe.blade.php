@extends('layouts.home');
@section('title','修改菜谱')
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
        <form action="{{url('/home/personal/recipe/alert/'.$recipe->id)}}" method="post" enctype="multipart/form-data">
            <div class="mod_right">
                <div id="mod_location">
                    <div class="mod_location clear">
                        <div class="left">
                            <a href="{{url('home/personal/recipe/index')}}" title="回到我的菜谱" class="return"> </a>
                            编辑菜谱
                        </div>
                    </div>
                </div>
                <div class="mr_edit mr_edit_center clear">
                    <ul>
                        {{csrf_field()}}
                        <li>
                            <label class="must">菜谱名称</label><br>
                            <input name="recipe_name" class="inputL color_5b" type="text" value="{{$recipe->recipe_name}}">
                        </li>
                        <li>
                            <label class="must">成品图片（最多9张）</label><br>
                            <div class="J_uploadflash">上传成品图<div id="J_uploadflash"></div></div>

                            <span class="tip" id="multi_cover_status"> </span>
                            <div id="cover" class="clear">
                                <img src="{{$recipe->face}}">
                            </div>
                            <input type="file"  name="face" id="doc" multiple="multiple"  style="width:150px;" onchange="setImagePreviews();" accept="image/*" />
                        </li>
                        <li>
                            <textArea class="J_input" name="introduction">{{$recipe->introduction}}</textArea>
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
                                                    <input type="radio" name='nd' value='{{$n->recipe_name}}' {{$recipe->nd == $n->recipe_name?'checked':''}}>{{$n->recipe_name}}
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
                                                    <input type="radio" name='kw' value='{{$k->recipe_name}}' {{$recipe->kw == $k->recipe_name?'checked':''}}>{{$k->recipe_name}}
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
                                                    <input type="radio" name='gy' value='{{$g->recipe_name}}' {{$recipe->gy == $g->recipe_name?'checked':''}}>{{$g->recipe_name}}
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
                                                    <input type="radio" name='hs' value='{{$h->recipe_name}}' {{$recipe->hs == $h->recipe_name?'checked':''}}>{{$h->recipe_name}}
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
                                                    <input type="radio" name='cj' value='{{$c->recipe_name}}' {{$recipe->cj == $c->recipe_name?'checked':''}}>{{$c->recipe_name}}
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
                                                        <img id="imghead" name="img1" border="0" src="{{$op->img}}" width="215" height="158" onclick="$(this).parent().next().click();">
                                                    </div>
                                                    <input type="file" name="file0" onchange="previewImage(this)" style="display: none;">
                                                    <input type="hidden" name="img_h0" value="{{$op->img}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="right">
                                            <input type="hidden" value="" name="stepid">
                                            <textArea class="textArea J_input" name="note[]">{{$op->describe}}</textArea>
                                            <span class="J_step_num">1、</span>
                                            <a href="javascript:;" class="add J_addTextarea"></a>
                                            <a href="javascript:;" class="delete J_delTextarea"></a>
                                        </div>
                                    </blockquote>
                                @endforeach
                            </div>
                        </li>

                        <li>
                            <label>小窍门</label><br>
                            <textarea class="color_5b" name="tips" id="tips" >{{$recipe->tips}}</textarea>
                        </li>
                    </ul>
                </div>
                <div class="mr_edit mr_edit_fixed clear">
                    <input class="btn1" id="postbtn" type="submit" value="发布菜谱" data-id="0">
                </div>
            </div><!-- 右侧结束 -->
        </form>
    </div>



    <script type="text/html" id="J_addDiv">
        <div>
            <input type="text" name="food1[]" class="zhuliao btn37 J_input" value="" autocomplete="off">
            <input type="text" name="food2[]" class="yongliang btn37 J_input" value="" autocomplete="off">
            <a href="javascript:;" class="delete J_delete"></a>
        </div>
    </script>
    <script type="text/html" id="J_addStep">
        <blockquote class="cp_block J_blockQ clear">
            <div id="addCommodityIndex" style="float:left;">
                <!--input-group start-->
                <div class="input-group row">
                    <div class="col-sm-9 big-photo">
                        <div id="preview">
                            <img id="imghead" name="img1" border="0" src="{{url('home/images/photo_icon.png')}}" width="215" height="158" onclick="$(this).parent().next().click();" >
                        </div>
                        <input type="file" onchange="previewImage(this)" style="display: none;" name="file0">
                        <!--<input id="uploaderInput" class="uploader__input" style="display: none;" type="file" accept="" multiple="">-->
                    </div>
                </div>
                <!--input-group end-->
            </div>
            <div class="right">
                <input type="hidden" value="" name="stepid">
                <textArea class="textArea J_input" name="note">请输入做法说明菜谱描述，最多输入1000字</textArea>
                <span class="J_step_num">${num}、</span>
                <a href="javascript:;" class="add J_addTextarea"></a>
                <a href="javascript:;" class="delete J_delTextarea"></a>
            </div>
        </blockquote>
    </script>
    <script type="text/javascript">

        //下面用于多图片上传预览功能

        function setImagePreviews(avalue) {
            var docObj = document.getElementById("doc");
            var dd = document.getElementById("cover");
            dd.innerHTML = "";
            var fileList = docObj.files;
            for (var i = 0; i < fileList.length; i++) {
                dd.innerHTML += "<div style='float:left' > <img id='img" + i + "'  /> </div>";
                var imgObjPreview = document.getElementById("img"+i);
                if (docObj.files && docObj.files[i]) {
                    //火狐下，直接设img属性
                    imgObjPreview.style.display = 'block';
                    imgObjPreview.style.width = '150px';
                    imgObjPreview.style.height = '180px';
                    //imgObjPreview.src = docObj.files[0].getAsDataURL();

                    //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                    imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);
                }

            }
            return true;
        }



        //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
            var MAXWIDTH  = 215;
            var MAXHEIGHT = 157;
            var div = $(file).prev()[0];
            if (file.files && file.files[0])
            {
                div.innerHTML ='<img id=imghead onclick="$(this).parent().next().click();" width="215" height="158">';
                var img = $(file).prev().find('img')[0];

                var reader = new FileReader();
                reader.onload = function(evt){img.src = evt.target.result;}
                reader.readAsDataURL(file.files[0]);
            }

        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }

        // 遍历每一个
        $(function(){
            $('#dragsort').find('blockquote').each(function(){
                $(this).find('input[type=file]').each(function(){
                    var n = $(this).parent().parent().parent().parent().index()
                    $(this).attr('name','file'+n)
                    $(this).next().attr('name','img_h'+n)
                })
                $(this).find('.J_step_num').each(function(){
                    var n = $(this).parent().parent().index();
                    n++;
                    $(this).html(n+'、')
                })
            })
        })
    </script>
    <script src="{{url('home/js/editRecipe.js')}}"></script>
@endsection
@section('footer')
@endsection