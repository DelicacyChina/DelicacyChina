<?php

namespace App\Http\Controllers\Admin\ManageWeb;

use App\Libraries\UploadFileName;
use App\Models\Banner;
use App\Models\BannerArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerArticleController extends Controller
{
    //
    // banner文章列表
    public function article()
    {
        return view('admin.manageWeb.bannerArticle');
    }

    // add文章页面
    public function addArticle()
    {
        return view('admin.manageWeb.addBannerArticle');
    }

    // add文章
    public function add(Request $request)
    {
        $n = count($request->all()['article_title']);
        //  添加到banner表中
        // 获取上传信息
        $upload = $request->face;

        $filename = UploadFileName::upload($upload);

        // 将数据添加到表中
        $banner = Banner::create([
            'banner_title' => $request->all()['title'],
            'introduces' => $request->all()['introduction']     ,
            'face_img' => $filename,
        ]);

        // 遍历章节
        for ($i = 0; $i < $n; $i++)
        {
            BannerArticle::create([
                'banner_id' => $banner->id,
                'article_title' => $request->all()['article_title'][$i],
                'contents' => $request->all()['content'][$i],
                'article_key' => $request->all()['article_key'][$i]
            ]);
        }
        echo "<script>alert('修改成功');history.go(-2);</script>";
    }

    // 列表
    public function listInfo()
    {
        return Banner::all();
    }

    // 详情
    public function detail($id)
    {
        $res = BannerArticle::where('banner_id',$id)
                        ->get();
        $name = Banner::find($id);
        return view('admin.manageWeb.article')
                            ->with('article',$res)
                            ->with('banner',$name);
    }
}
