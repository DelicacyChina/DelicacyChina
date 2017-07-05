<?php

namespace App\Http\Controllers\Admin\Pending;

use App\Models\Blog;
use App\Models\BlogImg;
use App\Models\ReceiveLetter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // 显示未审核
    public function index()
    {
        $blogs = Blog::select('u_username','blogs.id as bid','title','blogs.updated_at as time')
            ->where('blogs.status',0)
            ->leftJoin('users','users.id','uid')->paginate(3);
        return view('admin.pending.blogPending')->with('blogs',$blogs);
    }

    // 显示菜谱详情
    public function blogDetail($bid)
    {
        $blog = Blog::where('id',$bid)->get()[0];
        $user = User::where('id',$blog->uid)->get()[0];
        $blog_img = BlogImg::where('bid',$bid)->get();
        return view('admin.pending.blogDetail')->with('blog',$blog)
            ->with('user',$user)
            ->with('blog_img',$blog_img);
    }

    // 进行审核
    public function blogPending(Request $request)
    {
        // 改变状态
        if($request->suggest == '通过'){
            Blog::where('id',$request->rid)
                ->update(['status'=>1,'comment'=>$request->suggest]);
        } else {
            Blog::where('id',$request->rid)
                ->update(['status'=>2,'comment'=>$request->suggest]);
        }

        $blog = Blog::where('id',$request->rid)->get()[0];

        // 编辑私信内容
        if($blog->status == 1){
            $content = '您的日志《'.$blog->title.'》已经通过审核';
        } else {
            $content = '您的日志《'.$blog->title.'》没有通过审核';
        }

        // 发送私信
        ReceiveLetter::create([
            'sid' => Auth::guard('admin')->user()->id,
            'guard' => 1,
            'rid' => $request->uid,
            'content' => $content
        ]);

        return '<script>alert("审核成功");window.location.href="/admin/pending/blog/index"</script>';

    }
}
