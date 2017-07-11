<?php

namespace App\Http\Controllers\Home\Personal;

use App\Models\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CollectController extends Controller
{
    //
    //菜谱收藏
    public function recipeCollect(Request $request){
        if(Auth::check()){
            Collect::create([
                'uid'=>Auth::user()->id,
                'rid'=>$request->rid,
            ]);
        }

        return '1';
    }

    // 用户收藏遍历
    public function index()
    {
        $collects =  Collect::where('collects.uid',Auth::user()->id)
                            ->leftJoin('recipes','recipes.id','rid')->get();
        return view('home.personal.collect.mycollect')->with('collects',$collects);

    }

    // 删除收藏
    public function delCollect($id)
    {
        Collect::where('rid',$id) ->delete();
        return back();
    }
}
