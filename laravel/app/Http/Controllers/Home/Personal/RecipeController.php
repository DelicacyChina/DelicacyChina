<?php

namespace App\Http\Controllers\Home\Personal;

use App\Libraries\UploadFileName;
use App\Models\CategoryRecipe;
use App\Models\Collect;
use App\Models\Recipe;
use App\Models\RecipeFood;
use App\Models\RecipeOption;
use App\Models\UserInfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    // 显示我的菜谱
    public function index()
    {
        $recipes = Recipe::where('uid',Auth::user()->id)
            ->where('status',1)
            ->get();
        return view('home.personal.recipe.recipe')->with('recipes',$recipes);
    }
    // 显示待审核
    public function recipePending()
    {
        $recipes = Recipe::where('uid',Auth::user()->id)
            ->where('status',0)
            ->get();
        return view('home.personal.recipe.recipePending')->with('recipes',$recipes);
    }
    // 显示退稿
    public function recipeFaild()
    {
        $recipes = Recipe::where('uid',Auth::user()->id)
            ->where('status',2)
            ->get();
        return view('home.personal.recipe.recipeFaild')->with('recipes',$recipes);
    }
    //   显示添加菜谱
    public function addRecipe()
    {
        $nandus = CategoryRecipe::all()->where('recipe_parentId', '13');
        $kouweis = CategoryRecipe::all()->where('recipe_parentId', '15');
        $gongyis = CategoryRecipe::all()->where('recipe_parentId', '16');
        $shijians = CategoryRecipe::all()->where('recipe_parentId', '14');
        $chujus = CategoryRecipe::all()->where('recipe_parentId', '123');
        return view('home.personal.recipe.editRecipe')->with('nandus', $nandus)
            ->with('kouweis', $kouweis)
            ->with('gongyis', $gongyis)
            ->with('shijians', $shijians)
            ->with('chujus', $chujus);
    }

    // 菜谱详情
    public function recipeDetail(Request $request,$id){

        $caipus = Recipe::all()->where('id',$id);
        $yhimgs = '';
        foreach($caipus as $caipu)
        {
            $cpnames = $caipu->recipe_name;
            $cpfaces = $caipu->face;
            $cpuid = $caipu->uid;
            $cpnd = $caipu->nd;
            $cpkw = $caipu->kw;
            $cpgy = $caipu->gy;
            $cphs = $caipu->hs;
            $cpcj = $caipu->cj;
            $cptip = $caipu->tips;
        }

        $users = User::all()->where('id',$cpuid);
        foreach($users as $user)
        {
            $usernames = $user->u_username;
            $uid = $user->id;
        }


        $usericons= UserInfo::all()->where('uid',$cpuid);
        foreach($usericons  as $usericon)
        {
            $yhimgs = $usericon->icon;
        }

        $yongliaos = RecipeFood::all()->where('rid',$id);

        $buzous = RecipeOption::where('rid',$id)->get();


        $collect = '';
        if(Auth::check()){
            $collect = Collect::where('uid',Auth::user()->id)->where('rid',$id)->get();
        }

        return view('home/personal/recipe/recipeDetail')->with('cpnames',$cpnames)
            ->with('cpfaces',$cpfaces)
            ->with('usernames',$usernames)
            ->with('yhimgs',$yhimgs)
            ->with('yongliaos',$yongliaos)
            ->with('caipus',$caipus)
            ->with('cpnd',$cpnd)
            ->with('cpkw',$cpkw)
            ->with('cpgy',$cpgy)
            ->with('cphs',$cphs)
            ->with('cpcj',$cpcj)
            ->with('buzous',$buzous)
            ->with('cptip',$cptip)
            ->with('id',$id)
            ->with('uid',$uid)
            ->with('collect',$collect);

    }

}
