@extends('layouts.admin')
@section('crumb')
    <li><a>分类管理</a></li>
    <li class="'active">食材管理</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                食材分类列表
                @if(isset($p))
                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{$p['food_name']}}
                    </small>
                @endif
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
                                    <th class="hidden-480">状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($foods as $r)
                                    <tr>
                                        <td>
                                            <a href="#" name="id">{{$r->id}}</a>
                                        </td>
                                        <td><a href="{{url('admin/category/food/list/'.$r->id)}}">{{$r->food_name}}</a></td>
                                        <td class="hidden-480">
                                            @if($r->status==1)
                                                <button class="btn btn-xs btn-info" value="1" name="show">显示</button>
                                            @else
                                                <button class="btn btn-xs btn-danger" value="0" name="show">隐藏</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                <button class="btn btn-xs btn-info" name="editFood">
                                                    <i class="icon-edit bigger-120"></i>
                                                </button>

                                                <button class="btn btn-xs btn-danger" name="delFood">
                                                    <i class="icon-trash bigger-120"></i>
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

                <div class="hr hr-18 dotted hr-double"></div>

                <h4 class="pink">
                    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                    <a href="#modal-form" role="button" class="green" data-toggle="modal"> 添加新的食材类别 </a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>

                {{--添加食材分类模态框--}}
                <form id="addFood" onsubmit="return false">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token">
                    <div id="modal-form" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="blue bigger">请添加新的食材分类</h4>
                                </div>
                                <div class="modal-body overflow-visible">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7">

                                            <div class="form-group">
                                                <label for="form-field-username"> 食材类别名</label>
                                                <div>
                                                    <input class="input-large" type="text" id="form-field-username" name="food_name" placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label for="form-field-username"> 食材类别父级 </label>
                                                <div>
                                                    <input class="input-large" type="text" id="form-field-pid" name="Food_parentId" value="{{isset($p)?$p['id']:0}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="form-field-path"> 食材类别路径 </label>
                                                <div>
                                                    <input class="input-large" type="text" id="form-field-path" name="food_path" value="{{isset($p)?($p['food_path'].$p['id'].','):'0,'}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>状态</label>
                                                <div class="radio">
                                                    <label>
                                                        <input name="status" type="radio" class="ace" value="1" checked>
                                                        <span class="lbl"> 显示</span>
                                                    </label>
                                                    <label>
                                                        <input name="status" type="radio" class="ace" value="2">
                                                        <span class="lbl"> 隐藏</span>
                                                    </label>
                                                </div>
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

                {{--修改食材分类模态框--}}
                <form id="editFood" onsubmit="return false">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" id="_edittoken">
                    <input type="hidden" value="" name="id" id="editID">
                    <div id="modal-edit" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="blue bigger">请修改食材分类</h4>
                                </div>
                                <div class="modal-body overflow-visible">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-7">

                                            <div class="form-group">
                                                <label for="form-field-username"> 食材类别名</label>
                                                <div>
                                                    <input class="input-large" type="text" id="edit-field-username" name="food_name" placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label for="form-field-username"> 食材类别父级 </label>
                                                <div>
                                                    <input class="input-large" type="text" id="edit-field-pid" name="food_parentId" value="0" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="form-field-path"> 食材类别路径 </label>
                                                <div>
                                                    <input class="input-large" type="text" id="edit-field-path" name="food_path" value="0," readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>状态</label>
                                                <div class="radio">
                                                    <label>
                                                        <input name="edit_status" type="radio" class="ace" value="1">
                                                        <span class="lbl"> 显示</span>
                                                    </label>
                                                    <label>
                                                        <input name="edit_status" type="radio" class="ace" value="0">
                                                        <span class="lbl"> 隐藏</span>
                                                    </label>
                                                </div>
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
                                        修改
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
        // 添加分类
        $('#addFood').submit(function(){
            var name = $('#form-field-username').val();
            var path = $('#form-field-path').val();
            var pid = $('#form-field-pid').val();
            var status = $('input:radio[name=status]:checked').val();
            var token = $('#_token').val();
            $.ajax({
                url:'/admin/category/food/add',
                type:'post',
                data:{food_name:name,food_parentId:pid,food_path:path,status:status,_token:token},
                dataType:'json',
                success:function (data) {
                    alert('添加成功')
                    setTimeout(function(){$("#modal-form").modal("hide")},1000);
                    window.location.reload()
                }
            })
        })

        // 修改分类
        $('#editFood').submit(function(){
            var name = $('#edit-field-username').val();
            var status = $('input:radio[name=edit_status]:checked').val();
            var id = $('#editID').val();
            var token = $('#_edittoken').val();
            $.ajax({
                url:'/admin/category/food/edit',
                type:'post',
                data:{food_name:name,id:id,status:status,_token:token},
                dataType:'json',
                success:function (data) {
                    alert(' 修改成功')
                    window.location.reload();
                },
                error:function(xhr) {
                    alert('修改失败');
                }
            })
        })

        // 显示修改分类的模态框
        $('button[name=editFood]').each(function (){
            $(this).click(function(){
                $("#modal-edit").modal("show")
                var id = $(this).parent().parent().parent().find('a[name=id]').html();
                $.ajax({
                    url:'/admin/category/food/findFood',
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    success:function(data){
                        $('#edit-field-username').val(data.food_name);
                        $('#edit-field-pid').val(data.food_parentId);
                        $('#edit-field-path').val(data.food_path);
                        $('#editID').val(data.id);
                        if(data.status == 1){
                            $('input:radio[name=edit_status]').eq(0).attr('checked','checked')
                        } else {
                            $('input:radio[name=edit_status]').eq(1).attr('checked','checked')
                        }
                    }
                })
            })
        })

        // 修改显示状态
        $('button[name=show]').each(function(){
            $(this).click(function(){
                var status = $(this).val();
                var id = $(this).parent().parent().find('a[name=id]').html();
                $.ajax({
                    url:'/admin/category/food/changeStatus',
                    type:'get',
                    data:{status:status,id:id},
                    success:function (data) {
                        alert('修改成功')
                        window.location.reload();
                    },
                    error:function(xhr,mess){
                        console.log(mess)
                    }
                })
            })
        })

        // 删除分类
        $('button[name=delFood]').each(function(){
            $(this).click(function(){
                var id = $(this).parent().parent().parent().find('a[name=id]').html();
                $.ajax({
                    url:'/admin/category/food/del',
                    type:'get',
                    dataType:'json',
                    data:{id:id},
                    success:function(data){
                        alert('删除成功')
                        window.location.reload();
                    },
                    error:function(data){
                        alert('删除失败')
                    }
                })
            })

        })
    </script>
    <script>
        $(function(){
            $('.nav-list > li').eq(2).attr('class','active')
        })
    </script>
@endsection