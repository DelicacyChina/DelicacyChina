@extends('layouts.home')
@section('title','发布话题')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/addtalk.css')}}">
    <link rel="stylesheet" href="{{url('css/control/css/zyUpload.css')}}" type="text/css">
    <script src="{{url('css/core/zyFile.js')}}"></script>
    <script src="{{url('css/control/js/zyUpload.js')}}"></script>
    <script src="{{url('css/core/jq22.js')}}"></script>
@endsection
@section('content')
    <div class="w_main clear">
        @include('layouts.personal')
        <script>
            $('#talk').attr('class','on');
        </script>
        <!-- 右侧 -->
        <div class="mod_right">
            <div id="mod_location">
                <div class="mod_location clear">
                    <div class="left">
                        <a href="{{url('home/personal/talk/index')}}" title="回到我的话题" class="return"> </a>
                        发布新话题
                    </div>
                </div>
            </div>
                <div class="mr_edit mr_edit_center clear">
                    <ul>
                        <form action="{{url('/home/personal/talk/add')}}"enctype="multipart/form-data" method="post">
                            {{csrf_field()}}
                            <div id="cover" class="clear">
                            </div>
                            <input type="file"  name="face[]" id="doc" multiple="multiple"  style="width:150px;" onchange="setImagePreviews();" accept="image/*" />
                            <li>
                                <label>加个标题（非必填）</label><br>
                                <input id="com_title" name="title" class="inputM" type="text">
                            </li>
                            <li>
                                <label class="must">写话题</label><br>
                                <textarea id="J_message" name="message"></textarea>
                            </li>
                            <div class="mr_edit mr_edit_fixed clear">
                                <input class="btn1" name="submit" type="submit" value="发布话题">
                            </div>
                        </form>
                    </ul>
             </div>
        </div><!-- 右侧结束 -->
    </div>
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
    </script>
@endsection
@section('footer')
@endsection
