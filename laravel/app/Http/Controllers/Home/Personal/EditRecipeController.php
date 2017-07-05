<?php

namespace App\Http\Controllers\Home\Personal;

use App\Libraries\UploadFileName;
use App\Models\CategoryRecipe;
use App\Models\Recipe;
use App\Models\RecipeFood;
use App\Models\RecipeOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditRecipeController extends Controller
{
    //
    // 添加菜谱
    public function add(Request $request)
    {
        // 将数据添加到菜谱表中
        $res = Recipe::create($request->all());
        // 上传图片
        $filename = UploadFileName::upload($request->face);
        Recipe::where('id',$res->id)
            ->update([
                'face'=>$filename,
                'uid'=>Auth::user()->id
            ]);
        //  上传材料
        $i = -1;
        foreach($request->food1 as $food){
            $i++;
            if(empty($food)){
                continue;
            }
            RecipeFood::create([
                'rid'=>$res->id,
                'food_name'=>$food,
                'weight'=>$request->food2[$i],
                'status'=>1
            ]);
        }
        $i = -1;
        foreach($request->food3 as $food){
            $i++;
            if(empty($food)){
                continue;
            }
            RecipeFood::create([
                'rid'=>$res->id,
                'food_name'=>$food,
                'weight'=>$request->food4[$i],
                'status'=>2
            ]);
        }

        // 上传步骤
        $i = -1;
        foreach($request->note as $n)
        {
            //  拼接文件name名
            $i++;
            $file = 'file'.$i;
            if($n == '请输入做法说明菜谱描述，最多输入1000字' && empty($request->$file))
            {
                continue;
            }
            if($n == '请输入做法说明菜谱描述，最多输入1000字'){
                $n = null;
            }
            if(empty($request->$file)){
                $filename = null;
            } else {
                $filename = UploadFileName::upload($request->$file);
            }
            RecipeOption::create([
                'rid'=>$res->id,
                'img'=>$filename,
                'describe'=>$n
            ]);
        }
        return '<script>alert("上传成功");window.location.href="/home/personal/recipe/index"</script>';
    }

    // 查看菜谱
    public function show($rid)
    {
        $recipe = Recipe::where('id',$rid)->get()[0];
        $recipe_foods = RecipeFood::where('rid',$rid)->get();
        $recipe_ops = RecipeOption::where('rid',$rid)->get();
        $nandus = CategoryRecipe::all()->where('recipe_parentId', '13');
        $kouweis = CategoryRecipe::all()->where('recipe_parentId', '15');
        $gongyis = CategoryRecipe::all()->where('recipe_parentId', '16');
        $shijians = CategoryRecipe::all()->where('recipe_parentId', '14');
        $chujus = CategoryRecipe::all()->where('recipe_parentId', '123');
        return view('home.personal.recipe.recipeShow')->with('recipe',$recipe)
                                                      ->with('recipe_foods',$recipe_foods)
                                                      ->with('recipe_ops',$recipe_ops)
                                                      ->with('nandus', $nandus)
                                                      ->with('kouweis', $kouweis)
                                                      ->with('gongyis', $gongyis)
                                                      ->with('shijians', $shijians)
                                                      ->with('chujus', $chujus);
    }


    // 修改菜谱页面
    public function alertView($rid)
    {
        $recipe = Recipe::where('id',$rid)->get()[0];
        $recipe_foods = RecipeFood::where('rid',$rid)->get();
        $recipe_ops = RecipeOption::where('rid',$rid)->get();
        $nandus = CategoryRecipe::all()->where('recipe_parentId', '13');
        $kouweis = CategoryRecipe::all()->where('recipe_parentId', '15');
        $gongyis = CategoryRecipe::all()->where('recipe_parentId', '16');
        $shijians = CategoryRecipe::all()->where('recipe_parentId', '14');
        $chujus = CategoryRecipe::all()->where('recipe_parentId', '123');
        return view('home.personal.recipe.alertRecipe')->with('recipe',$recipe)
            ->with('recipe_foods',$recipe_foods)
            ->with('recipe_ops',$recipe_ops)
            ->with('nandus', $nandus)
            ->with('kouweis', $kouweis)
            ->with('gongyis', $gongyis)
            ->with('shijians', $shijians)
            ->with('chujus', $chujus);
    }

    // 修改功能
    public function alert(Request $request,$rid)
    {
        // 将数据添加到菜谱表中
        $filename = Recipe::select('face')->where('id',$rid)->get()[0]->face;
        if(isset($request->face))
        {
            unlink(ltrim($filename,'/'));
            $filename = UploadFileName::upload($request->face);
        }  else {
            $filename = ltrim(strrchr($filename,'/'),'/');
        }
        $res = Recipe::where('id',$rid)->update([
            'recipe_name' => $request->recipe_name,
            'face'=>$filename,
            'nd'=>$request->nd,
            'kw'=>$request->kw,
            'gy'=>$request->gy,
            'cj'=>$request->cj,
            'hs'=>$request->hs,
            'tips'=>$request->tips,
            'status'=>0,
            'introduction'=> $request->introduction
        ]);


        //  上传材料
        // 删除原先的材料
        RecipeFood::where('rid',$rid)->delete();
        $i = -1;
        foreach($request->food1 as $food){
            $i++;
            if(empty($food)){
                continue;
            }
            RecipeFood::create([
                'rid'=>$rid,
                'food_name'=>$food,
                'weight'=>$request->food2[$i],
                'status'=>1
            ]);
        }
        $i = -1;
        foreach($request->food3 as $food){
            $i++;
            if(empty($food)){
                continue;
            }
            RecipeFood::create([
                'rid'=>$rid,
                'food_name'=>$food,
                'weight'=>$request->food4[$i],
                'status'=>2
            ]);
        }

        // 上传步骤
        $i = -1;
        $imgs = RecipeOption::where('rid',$rid)->get();
        foreach ($imgs as $img){
           unlink(ltrim($img->img,'/'));
        }
        RecipeOption::where('rid',$rid)->delete();
        foreach($request->note as $n)
        {
            //  拼接文件name名
            $i++;
            $file = 'file'.$i;
            if($n == '请输入做法说明菜谱描述，最多输入1000字' && empty($request->$file))
            {
                continue;
            }
            if($n == '请输入做法说明菜谱描述，最多输入1000字'){
                $n = null;
            }
            if(empty($request->$file)){
                $t = 'img_h'.$i;
                if(isset($request->$t)) {
                    $filename = $request->$t;
                    $filename = ltrim(strrchr($filename,'/'),'/');
                }  else {
                    $filename = null;
                }

            } else {
                $filename = UploadFileName::upload($request->$file);
            }
            RecipeOption::create([
                'rid'=>$rid,
                'img'=>$filename,
                'describe'=>$n
            ]);
        }
        return '<script>alert("修改成功");window.location.href="/home/personal/recipe/index"</script>';
    }

    // 修改
    public function del($rid)
    {
        unlink(ltrim(Recipe::where('id',$rid)->get()[0]->face,'/'));
        Recipe::where('id',$rid)->delete();
        RecipeOption::where('rid',$rid)->delete();
        $imgs = RecipeFood::where('rid',$rid)->get();
        foreach ($imgs as $img)
        {
            if(isset($img->img)){
                unlink(ltrim($img->img,'/'));
            }
        }
        RecipeFood::where('rid',$rid)->delete();
        return '<script>alert("删除成功");self.location=document.referrer;</script>';
    }

}
