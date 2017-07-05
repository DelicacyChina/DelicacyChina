@extends('layouts.admin')
@section('crumb')
    <li><a>网站页面视图管理</a></li>
    <li class="'active">banner管理</li>
@endsection
@section('content')
    <div class="page-content">
        <h4 class="pink">
            <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
            <a href="{{URL('admin/manageWeb/banner/article')}}" class="green">  返回上一级 </a>
        </h4>
        <div class="hr hr-18 dotted hr-double"></div>
            <div class="page-header">
                <h1>添加banner文章</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{url('admin/manageWeb/banner/article/add')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 文章标题 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="Title" class="col-xs-10 col-sm-5" name="title">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章简介 </label>

                            <div class="col-sm-4">
                                <textarea class="form-control" placeholder="Introduction" name="introduction"></textarea>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 封面 </label>

                            <div class="col-sm-4">
                                <div class="ace-file-input ace-file-multiple">
                                    <input type="file" id="id-input-file-3" name="face">
                                </div>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <a id="addMore">加载更多章节</a>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    保存
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>


                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@endsection
@section('js')
    <script type="text/html" id="addContent">
        <div class="form-group article">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 第${i}章标题 </label>

            <div class="col-sm-9">
                <input type="text" placeholder="title" class="col-xs-10 col-sm-5" name="article_title[]">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 关键字 </label>

            <div class="col-sm-9">
                <input type="text" placeholder="key word;" class="col-xs-10 col-sm-5" name="article_key[]">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 章节内容 </label>

            <div class="col-sm-4">
                <textarea class="form-control" placeholder="Content" name="content[]"></textarea>
            </div>
        </div>

        <div class="space-4"></div>
    </script>
    <script>
        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })


        $('#addMore').click(function(){
            var i = $('.article') .size();
            console.log(i);
            i++;
            var data = {'i':i}
            $("#addContent").tmpl(data).insertBefore('#addMore')
        })

        $(function(){
            $('.nav-list > li').eq(1).attr('class','active')
        })
    </script>
@endsection