@extends('layouts.home');
@section('title','查看日志')
@section('css')
    <link rel="stylesheet" href="{{url('home/css/blog.css')}}">
    <script src="http://cdn.bootcss.com/ckeditor/4.5.11/ckeditor.js"></script>
    <style>
        .m{ width: 1030px; margin-top: 20px; }
    </style>

@endsection
@section('content')
    <!-- 主框架 -->
    <div class="w_main clear">
        @include('layouts.personal')
        <script>
            $('#blog').attr('class','on')
        </script>
        <div class="mod_right">
            <div id="mod_location">
                <div class="mod_location clear">
                    <div class="left">
                        <a href="{{url('home/personal/blog/editBlog')}}" title="回到我的日志" class="return"> </a>
                        编辑日志
                    </div>
                </div>
            </div>
            <form action="{{url('/home/personal/blog/edit')}}" id="J_form" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="mr_edit mr_edit_center clear">
                    <ul>
                        <li>
                            <label class="must">日志标题</label><br>
                            <input name="title" class="inputL" type="text" id="J_subject" value="{{$blog->title}}">
                        </li>
                        <input type="hidden" name="id" value="{{$blog->id}}">
                        <div id="cover" class="clear">
                            @if(isset($img[0]))
                                @foreach($img as $i)
                                    <img src="{{$i->img}}" width="160" height="100" />
                                @endforeach
                            @endif
                        </div>
                        <input type="file"  name="face[]" id="doc" multiple="multiple"  style="width:150px;" onchange="setImagePreviews();" accept="image/*" />
                        <li>
                            <label class="must">日志正文</label><br>
                            <div class="m">
                                <textarea rows="30" cols="50" name="content">
                                     {!! $blog->content !!}
                                </textarea>
                                <script type="text/javascript">CKEDITOR.replace('content');</script>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mr_edit mr_edit_fixed clear">
                    <input name="submit" value="修改日志" class="btn1" type="submit">
                </div>
            </form>
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