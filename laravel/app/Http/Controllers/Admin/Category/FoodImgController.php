<?php

namespace App\Http\Controllers\Admin\Category;

use App\Libraries\UploadFileName;
use App\Models\CategoryFoodImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodImgController extends Controller
{
    //
    public function index()
    {
        $foods = CategoryFoodImg::rightjoin('category_foods','category_foods.id','=','category_food_imgs.food_id')
                                ->where('food_parentId','>','0')
                                ->paginate(3);
        return view('admin.category.foodImg',['foods'=>$foods]);
    }

    public function uploadImg(Request $request)
    {
        // 获取文件数据信息
        $img = CategoryFoodImg::where('food_id',$request->all()['food_id'])->get();
        // 获取上传信息
        $upload = $request->img;

        $filename = UploadFileName::upload($upload);

        // 数据库中存在
        if(isset($img[0])){
            unlink($img[0]->img_url);
            CategoryFoodImg::where('food_id',$request->all()['food_id'])
                            ->update([
                                'img_url' => $filename
                            ]);
        } else {
            CategoryFoodImg::create([
                'food_id' => $request->all()['food_id'],
                'img_url' => $filename
            ]);

        }
        echo '<script>alert("图片上传成功");history.go(-1);</script>' ;
        die;
    }

}
