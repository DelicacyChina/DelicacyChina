@extends('layouts.admin')
@section('crumb')
    <li><a>分类管理</a></li>
    <li class="'active">食材管理</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                食材图片管理
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
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th class="hidden-480">图片</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($foods as $r)
                                    <tr>
                                        <td>
                                            <a href="#" name="id">{{$r->id}}</a>
                                        </td>
                                        <td name="food_name">{{$r->food_name}}</td>
                                        <td class="hidden-480" align="center">
                                            @if(empty($r->img_url))
                                               暂无图片
                                            @else
                                                <img src="{{(url($r->img_url))}}" width="100" height="60">
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
                                    <tr><td colspan="4">暂无数据</tr>
                                @endforelse
                                </tbody>


                            </table>
                            <input type="hidden" value="{{$foods->currentPage()}}" id="currentPage">
                            {{$foods->links()}}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

                {{--添加食材图片模态框--}}
                <form id="addFood" action="{{url('admin/category/food/img/uploadImg')}}" enctype="multipart/form-data" method="post">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token">
                    <input type="hidden" value="" name="food_id" id="food_id">
                    <div id="modal-form" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="blue bigger">添加食材<span id="foodImg_name"></span>图片</h4>
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
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->

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
                var id = $(this).parent().parent().parent().find('a[name=id]').html();
                var name = $(this).parent().parent().parent().find('td[name=food_name]').html();
                $('#foodImg_name').html(name);
                $('#food_id').val(id);
            })
        })
        $(function(){
            $('.nav-list > li').eq(2).attr('class','active')
        })
    </script>
@endsection