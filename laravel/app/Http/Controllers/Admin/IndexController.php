<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mews\Captcha\Captcha;

class IndexController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }

    // 验证码是否正确
    public function captcha()
    {
        $yzm = $_POST['yzm'];
        echo captcha_check($yzm);
    }

    public function username(Request $request)
    {
        $user = Admin::where('a_username',$request->username)->get();
        foreach ($user as $u) {
            if($u->a_username){
                echo true;
            } else {
                echo false;
            }
        }
    }

    // 验证登陆
    public function doLogin(Request $request)
    {
        // 验证
        $rules = [
            'a_username' => 'required',
            'a_pwd' => 'required',
            'yzm' => 'required',
        ];
        $mess = [
            'a_username.required' => '用户名不能为空',
            'a_pwd.required' => '密码不能为空',
            'yzm.required' => '验证码不能为空'
        ];
        $this->validate($request,$rules,$mess);
        // 验证管理员身份
        if(Auth::guard('admin')->attempt(['a_username'=>$request->a_username,'password'=>$request->a_pwd])){
            return view('layouts.admin');
        } else {
            return view('admin.login')->with('messpwd','密码不正确');
        }
//        Admin::create([
//            'a_username' => $request->a_username,
//            'password' => Hash::make($request->a_pwd)
//        ]);

    }

}
