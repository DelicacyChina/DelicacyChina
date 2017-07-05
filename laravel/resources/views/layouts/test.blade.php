<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>美食天下后台</title>

    <!-- basic styles -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{url('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/ace-skins.min.css')}}" />

    <script src="{{url('assets/js/ace-extra.min.js')}}"></script>
    <script src="{{url('admin/js/jquery1.42.min.js')}}"></script>

</head>
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
                <tr>

                    <td>
                        <a href="#">1</a>
                    </td>
                    <td>常见菜式</td>
                    <td class="hidden-480">显示</td>
                    <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                                <i class="icon-ok bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-info">
                                <i class="icon-edit bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-danger">
                                <i class="icon-trash bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-warning">
                                <i class="icon-flag bigger-120"></i>
                            </button>
                        </div>

                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                    <span class="blue">
                                                                                        <i class="icon-zoom-in bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                    <span class="green">
                                                                                        <i class="icon-edit bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                                    <span class="red">
                                                                                        <i class="icon-trash bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>

                    <td>
                        <a href="#">1</a>
                    </td>
                    <td>常见菜式</td>
                    <td class="hidden-480">显示</td>
                    <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                                <i class="icon-ok bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-info">
                                <i class="icon-edit bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-danger">
                                <i class="icon-trash bigger-120"></i>
                            </button>

                            <button class="btn btn-xs btn-warning">
                                <i class="icon-flag bigger-120"></i>
                            </button>
                        </div>

                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                    <span class="blue">
                                                                                        <i class="icon-zoom-in bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                    <span class="green">
                                                                                        <i class="icon-edit bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                                    <span class="red">
                                                                                        <i class="icon-trash bigger-120"></i>
                                                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /span -->
</div><!-- /row -->


<form id="addRecipe" onsubmit="return false">
    <h4 class="pink">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        <a href="#modal-form" role="button" class="green" data-toggle="modal"> 添加新的菜谱类别 </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>
    <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token">
    <div id="modal-form" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="blue bigger">请添加新的菜谱分类</h4>
                </div>
                <div class="modal-body overflow-visible">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">

                            <div class="form-group">
                                <label for="form-field-username"> 菜谱类别名</label>
                                <div>
                                    <input class="input-large" type="text" id="form-field-username" name="recipe_name" placeholder="Name">
                                </div>
                            </div>

                            <div class="space-2"></div>

                            <div class="form-group">
                                <label for="form-field-username"> 菜谱类别父级 </label>
                                <div>
                                    <input class="input-large" type="text" id="form-field-pid" name="recipe_parentId" value="0" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="form-field-username"> 菜谱类别路径 </label>
                                <div>
                                    <input class="input-large" type="text" id="form-field-path" name="recipe_path" value="0," readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-field-first">状态</label>
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
<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/typeahead-bs2.min.js')}}"></script>
<script src="/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/assets/js/jquery.slimscroll.min.js"></script>
<script src="/assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="/assets/js/jquery.sparkline.min.js"></script>
