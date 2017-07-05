<?php

namespace App\Http\Controllers\Admin\ManageWeb;

use App\Libraries\UploadFileName;
use App\Models\Banner;
use App\Models\BannerArticle;
use App\Models\CategoryFoodImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::paginate(3);
        return view('admin.manageWeb.banner',['banners'=>$banners]);
    }

    public function changeStatus(Request $request)
    {
        $status = $request->all()['status']==1?0:1;
        Banner::where('id',$request->all()['id'])
                ->update(['status'=>$status]);
        return '111';
    }

    public function uploadBanner(Request $request)
    {
        // 获取文件数据信息
        $img = Banner::where('id',$request->all()['id'])->get();
        // 获取上传信息
        $upload = $request->img;

        $filename = UploadFileName::upload($upload);

        // 数据库中存在
        if(isset($img[0]->banner_img)) {
            unlink(public_path($img[0]->banner_img));
        }
        Banner::where('id',$request->all()['id'])
                ->update([
                    'banner_img' => $filename
                ]);
        echo '<script>alert("图片上传成功");history.go(-1);</script>' ;
        die;
    }
}
