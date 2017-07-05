@extends('layouts.admin')
@section('crumb')
    <li><a>页面视图管理</a></li>
    <li class="'active">banner管理</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                banner图片管理
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>名称</th>
                                    <th class="hidden-480">图片</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($banners as $banner)
                                        <tr>
                                            <input type="hidden" id="banner_id" value="{{$banner->id}}">
                                            <td>{{$banner->banner_title}}</td>
                                            <td align="center">
                                                @if($banner->banner_img)
                                                    <img src="{{$banner->banner_img}}" width="160" height="60">
                                                @else
                                                    暂无图片
                                                @endif
                                            </td>
                                            <td>
                                                @if($banner->status==1)
                                                    <button class="btn btn-xs btn-info" value="1" name="show">显示</button>
                                                @else
                                                    <button class="btn btn-xs btn-danger" value="0" name="show">隐藏</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <button class="btn btn-xs btn-info" name="editImg">
                                                        <i class="icon-edit bigger-120"></i>
                                                        图片管理
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4"></tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{$banners->links()}}
                        </div><!-- /.table-responsive -->
                        {{--添加食材图片模态框--}}
                        <form id="addFood" action="{{url('admin/manageWeb/banner/uploadBanner')}}" enctype="multipart/form-data" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token">
                            <input type="hidden" value="" name="id" id="food_id">
                            <div id="modal-form" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="blue bigger">添加banner图片</h4>
                                        </div>
                                        <div class="modal-body overflow-visible">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="space"></div>

                                                    <div class="ace-file-input ace-file-multiple">
                                                        <input type="file" name="img" id="foodImgUpload">
                                                        {{--<label class="file-label" data-title="Drop files here or click to choose"><span class="file-name" data-title="No File ..."><i class="icon-cloud-upload"></i></span></label>--}}
                                                        <a class="remove" href="#"><i class="icon-remove"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-sm" data-dismiss="modal">
                                                <i class="icon-remove"></i>
                                                 取消
                                            </button>
                                            <button class="btn btn-sm btn-primary" type='submit' id="addRe">
                                                <i class="icon-ok"></i>
                                                添加
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /span -->
                </div><!-- /row -->

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#modal-form input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })

        $('#modal-form').on('shown.bs.modal', function () {
            $(this).find('.chosen-container').each(function(){
                $(this).find('a:first-child').css('width' , '210px');
                $(this).find('.chosen-drop').css('width' , '210px');
                $(this).find('.chosen-search input').css('width' , '200px');
            });
        })

        $('button[name=editImg]').each(function (){
            $(this).click(function(){
                $("#modal-form").modal("show")
                var id = $(this).parent().parent().parent().find('input').val();
                $('#food_id').val(id);
            })
        })
        $('button[name=show]').each(function(){
            $(this).click(function(){
                var status = $(this).val();
                var id = $(this).parent().parent().find("input").val();
                $.ajax({
                    url:'/admin/manageWeb/banner/changeStatus',
                    type:'get',
                    data:{status:status,id:id},
                    success:function (data) {
                        alert('修改成功')
                        window.location.reload();
                    },
                    error:function(xhr,mess){
                        alert('修改失败')
                    }
                })
            })
        })
        $(function(){
            $('.nav-list > li').eq(1).attr('class','active')
        })
    </script>
@endsection