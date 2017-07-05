<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    // 显示菜单的一级列表
    public function index($pid = 0)
    {
        $recipes = CategoryRecipe::where('recipe_parentId',$pid)->paginate(3);
        $res = CategoryRecipe::find($pid);
        return view('admin.category.recipe',['recipes'=>$recipes,'p'=>$res]);
    }

    //添加菜单类别
    public function add(Request $request)
    {
        $res = CategoryRecipe::create($request->all());
        //return redirect('/admin/category/recipe');
        echo $res->id;

    }

    //改变状态
    public function changeStatus(Request $request){
        $status = $request->all()['status'] == 1? 0:1;
        $res = CategoryRecipe::where('id',$request->all()['id'])
            ->update(['status'=>$status]);
        echo '11';
    }

    // 查找
    public function findRecipe(Request $request){
        $res = CategoryRecipe::find($request->all()['id']);
        echo $res;
    }

    // 修改
    public function edit(Request $request){
        $status = $request->all()['status'];
        $res = CategoryRecipe::where('id',$request->all()['id'])
            ->update([
                'recipe_name'=>$request->all()['recipe_name'],
                'status'=>$status
            ]);
        echo $res;
    }

    //  删除
    public function del(Request $request){
        $recipe = CategoryRecipe::find($request->all()['id'])->delete();
        echo $request->all()['id'];
    }
}
