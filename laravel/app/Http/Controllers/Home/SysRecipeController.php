<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SysRecipeController extends Controller
{
    //
    public function sysRecipeClass()
    {
        return view('home.recipe.sysRecipeClass');
    }

    public function sysRecipeList($rid)
    {
        return view('home.recipe.sysRecipeList')->with('cid',$rid);
    }

    public function sysRecipeDetail($rid)
    {
        return view('home.recipe.sysRecipeDetail')->with('rid',$rid);
    }
}
