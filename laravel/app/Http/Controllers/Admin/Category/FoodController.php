<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\CategoryFood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

    // 显示食谱的一级列表
    public function index($pid = 0)
    {
        $foods = CategoryFood::where('food_parentId',$pid)->paginate(3);
        $res = CategoryFood::find($pid);
        return view('admin.category.food',['foods'=>$foods,'p'=>$res]);
    }

    //添加食谱类别
    public function add(Request $request)
    {
        $res = CategoryFood::create($request->all());
        //return redirect('/admin/category/recipe');
        echo $res->id;

    }

    //改变状态
    public function changeStatus(Request $request){
        $status = $request->all()['status'] == 1? 0:1;
        $res = CategoryFood::where('id',$request->all()['id'])
            ->update(['status'=>$status]);
        echo '11';
    }

    // 查找
    public function findFood(Request $request){
        $res = CategoryFood::find($request->all()['id']);
        echo $res;
    }

    // 修改
    public function edit(Request $request){
        $status = $request->all()['status'];
        $res = CategoryFood::where('id',$request->all()['id'])
            ->update([
                'food_name'=>$request->all()['food_name'],
                'status'=>$status
            ]);
        echo $res;
    }

    //  删除
    public function del(Request $request){
        $recipe = CategoryFood::find($request->all()['id'])->delete();
        echo $request->all()['id'];
    }
}
