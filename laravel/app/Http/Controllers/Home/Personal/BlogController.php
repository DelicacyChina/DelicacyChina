<?php

namespace App\Http\Controllers\Home\Personal;

use App\Libraries\UploadFileName;
use App\Models\Blog;
use App\Models\BlogImg;
use App\Models\BlogLove;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // 显示
    public function index()
    {
        $blogs = Blog::where('uid',Auth::user()->id)
                     ->where('status',1)->get();
        return view('home.personal.blog.myBlog')->with('blogs',$blogs);
    }

    // 显示待审核
    public function blogPending()
    {
        $blogs = Blog::where('uid',Auth::user()->id)
            ->where('status',0)->get();
        return view('home.personal.blog.blogPending')->with('blogs',$blogs);
    }

    // 显示退稿箱
    public function blogFaild()
    {
        $blogs = Blog::where('uid',Auth::user()->id)
            ->where('status',2)->get();
        return view('home.personal.blog.blogFaild')->with('blogs',$blogs);
    }

    // 视图
    public function add()
    {
        return view('home.personal.blog.addBlog');
    }

    // 添加日志
    public function addBlog(Request $request)
    {
        $blog = Blog::create($request->all());
        // 上传图片
        if(isset($request->face[0])) {
            $filename = UploadFileName::mulUpload($request->face);
            foreach ($filename as $f)
            {
                BlogImg::create([
                    'bid'=>$blog->id,
                    'img'=>$f
                ]);
            }
        }
        return '<script>alert("日志发布成功");window.location.href="/home/personal/blog/index"</script>';
    }

    //  日志详情
     public function blogDetail($bid)
     {
         $blog = Blog::select('blogs.id as bid','blogs.uid as userid','u_username','blogs.updated_at as time','title','content','icon')
             ->where('blogs.id',$bid)
             ->leftJoin('user_infos','blogs.uid','user_infos.uid')
             ->leftJoin('users','users.id','blogs.uid')->get()[0];
         $img = BlogImg::where('bid',$blog->bid)->get();
         $count = 0;
         $count = BlogLove::where('bid',$blog->bid)->get()->count();
         $flag = false;
         if(Auth::check()) {
             $info = BlogLove::where('uid',Auth::user()->id)->where('bid',$bid)->get();
             if(isset($info[0])){
                 $flag = true;
             }
         }
         return view('home.personal.blog.blogDetail')->with('blog',$blog)
                                                     ->with('img',$img)
                                                     ->with('flag',$flag)
                                                     ->with('count',$count);
     }

     // 查看待审核日志
    public function show($bid)
    {
        $blog = Blog::where('id',$bid)->get()[0];
        $img = BlogImg::where('bid',$bid)->get();
        return view('home.personal.blog.showBlog')->with('blog',$blog)->with('img',$img);
    }

    // 修改日志
    public function editBlog($bid)
    {
        $blog = Blog::where('id',$bid)->get()[0];
        $img = BlogImg::where('bid',$bid)->get();
        return view('home.personal.blog.editBlog')->with('blog',$blog)->with('img',$img);
    }

    // 删除日志
    public function del($bid)
   {
	Blog::where('id',$bid)->delete();
	return back();

    }
    // 修改日志
    public function edit(Request $request)
    {
        if(isset($request->face)){
            //上传图片
            $filenames = UploadFileName::mulUpload($request->face);
            $img = BlogImg::where('bid',$request->id)->get();
            if(isset($img[0]->img)){
                foreach ($img as $i){
                    unlink(ltrim($i->img,'/'));
                }
            }
            BlogImg::where('bid',$request->id)->delete();
            foreach ($filenames as $f){
                BlogImg::create([
                    'bid'=>$request->id,
                    'img'=>$f
                 ]);
            }
        }
        Blog::where('id',$request->id)
            ->update([
                'title' => $request->title,
                'content'=>$request->content,
                'comment' => null,
                'status' => 0
            ]);
        return '<script>alert("修改成功");window.location.href="/home/personal/blog/blogPending"</script>';
    }

    // 喜欢
    public function like(Request $request)
    {

        if(Auth::check()){
            BlogLove::create([
                'uid'=>Auth::user()->id,
                'bid'=>$request->bid
            ]);
        }
        echo 1;

    }

    // 不喜欢
    public function delLike(Request $request)
    {
        BlogLove::where('bid',$request->bid)->delete();
    }

}
