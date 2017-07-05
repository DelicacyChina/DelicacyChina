<?php

namespace App\Http\Controllers\Home\Personal;

use App\Libraries\UploadFileName;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //
    public function index()
    {
        $user = User::where('u_username',Auth::user()->u_username)->leftJoin('user_infos','users.id','uid')->get();
        return view('home.personal.mySetting')->with('user',$user[0]);
    }

    // 保存修改
    public function edit(Request $request)
    {
        $user = User::where('u_email',$request->email)->get()[0];
        //  更新
        $user_info = UserInfo::where('uid',$user->id)->get();
        //上传图片
        $filename = null;
        if(isset($request->face)){
            $filename = UploadFileName::upload($request->face);
        }
        if(isset($user_info[0])){
            if($filename != null && $user_info[0]->icon)
            {
                unlink(ltrim($user_info[0]->icon,'/'));
            }
            if($filename == null)
            {
                $filename = ltrim(strrchr($user_info[0]->icon,'/'),'/');
            }
            UserInfo::where('uid',$user->id)
                     ->update([
                         'icon' => $filename,
                         'motto' => $request->motto,
                         'sex' => $request->sex,
                     ]);
        } else {

            UserInfo::create([
                'uid'=> $user->id,
                'icon' => $filename,
                'motto' => $request->motto,
                'sex' => $request->sex,
            ]);
        }

        return '<script>alert("保存成功");window.location.href="/home/personal/setting/index"</script>';
    }

    // 密码视图
    public function pwd()
    {
        return view('home.personal.editPwd');
    }

    // 修改密码
    public function checkPwd(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->get()[0];
        if(!Hash::check($request->password,$user->password)){
            return '<script>alert("密码不正确请重新输入");window.location.href="/home/personal/setting/pwd"</script>';
        } else {
            return redirect('/home/personal/setting/editPwd?pwd='.$request->newpassword1);
        }
    }

    // 修改密码
    public function editPwd(Request $request)
    {
        User::where('id',Auth::user()->id)
            ->update(['password'=> Hash::make($request->pwd)]);
        return '<script>alert("修改成功,请重新登陆");window.location.href="/home/logout"</script>';
    }

    // 找回密码
    public function foundPwd()
    {
        // $name = $request->name;
        $qu = DB::table('issues')->get();
        // dd($qu);
        return view('home.personal.foundPwd')->with('qu',$qu);


    }
    // 重置密码
    public function reset(request $request)
    {

        $an = DB::table('issues')->where('name',$request->name)->get();
        // dd($an);
        if($an[0]->answer == $request->answer1 && $an[1]->answer == $request->answer2 && $an[2]->answer == $request->answer3){
            DB::table('users')->where('id',$an[0]->uid)
                ->update(['password'=> Hash::make('123456')]);
            return '<script>alert("你的密码已经被重置为123456");window.location.href="/home/personal/setting/foundPwd"</script>';
        }
    }


    // 设置密保问题
    public function setAnswer()
    {

        return view('home.personal.setAnswer');
    }
    public function Answer(request $request)
    {
        $question1 = $request->question1;
        $question2 = $request->question2;
        $question3 = $request->question3;
        $answer1 = $request->answer1;
        $answer2 = $request->answer2;
        $answer3 = $request->answer3;
        $name = $request->name;
        // dd($name);
        // $qu = DB::table('issues')->get();
        $n = DB::table('users')->where('id', Auth::user()->id)->get();
        if ( $name == $n[0]->u_username){

            DB::table('issues')->insert(
                [
                    'uid' => Auth::user()->id,
                    'name' => $name,
                    'question' => $question1,
                    'answer' => $answer1,
                ]
            );
            DB::table('issues')->insert(
                [
                    'uid' => Auth::user()->id,
                    'name' => $name,
                    'question' => $question2,
                    'answer' => $answer2,
                ]
            );
            DB::table('issues')->insert(
                [
                    'uid' => Auth::user()->id,
                    'name' => $name,
                    'question' => $question3,
                    'answer' => $answer3,
                ]
            );

            return '<script>alert("保存成功");window.location.href="/home/personal/setting/setAnswer"</script>';
        } else {
            return '<script>alert("你的用户名输入不正确");window.location.href="/home/personal/setting/setAnswer"</script>';
        }

    }
}
