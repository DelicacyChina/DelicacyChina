<?php

namespace App\Http\Controllers\Admin\Pending;

use App\Models\ReceiveLetter;
use App\Models\Recipe;
use App\Models\RecipeFood;
use App\Models\RecipeOption;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    // 显示未审核
    public function index()
    {
        $recipes = Recipe::select('u_username','recipes.id as rid','recipe_name','recipes.updated_at as time')
                         ->where('recipes.status',0)
                         ->leftJoin('users','users.id','uid')->paginate(3);
        return view('admin.pending.recipePending')->with('recipes',$recipes);
    }

    // 显示菜谱详情
    public function recipeDetail($rid)
    {
        $recipe = Recipe::where('id',$rid)->get()[0];
        $user = User::where('id',$recipe->uid)->get()[0];
        $recipe_food = RecipeFood::where('rid',$rid)->get();
        $recipe_option = RecipeOption::where('rid',$rid)->get();
        return view('admin.pending.recipeDetail')->with('recipe',$recipe)
                                                 ->with('user',$user)
                                                 ->with('recipe_food',$recipe_food)
                                                 ->with('recipe_option',$recipe_option);
    }

    // 进行审核
    public function recipePending(Request $request)
    {
        // 改变状态
        if($request->suggest == '通过'){
            Recipe::where('id',$request->rid)
                ->update(['status'=>1,'comment'=>$request->suggest]);
        } else {
            Recipe::where('id',$request->rid)
                ->update(['status'=>2,'comment'=>$request->suggest]);
        }

        $recipe = Recipe::where('id',$request->rid)->get()[0];

        // 编辑私信内容
        if($recipe->status == 1){
            $content = '您的菜谱《'.$recipe->recipe_name.'》已经通过审核';
        } else {
            $content = '您的菜谱《'.$recipe->recipe_name.'》没有通过审核';
        }

        // 发送私信
        ReceiveLetter::create([
            'sid' => Auth::guard('admin')->user()->id,
            'guard' => 1,
            'rid' => $request->uid,
            'content' => $content
        ]);

        return '<script>alert("审核成功");window.location.href="/admin/pending/recipe/index"</script>';

    }
}
