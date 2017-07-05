@extends('layouts.admin')
@section('crumb')
    <li><a>审核管理</a></li>
    <li class="'active">日志审核</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                日志审核
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
                                    <th>标题</th>
                                    <th class="hidden-480">作者</th>
                                    <th>状态</th>
                                    <th>申请时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <input type="hidden" id="banner_id" value="">
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->u_username}}</td>
                                        <td>待审核</td>
                                        <td>{{$blog->time}}</td>
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="{{url('admin/pending/blog/detail/'.$blog->bid)}}">
                                                    <button class="btn btn-xs btn-info" name="editPending">
                                                        <i class="icon-edit bigger-120"></i>
                                                        审核
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5">暂无待审核日志</tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{$blogs->links()}}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function(){
            $('.nav-list > li').eq(3).attr('class','active')
        })
    </script>
@endsection