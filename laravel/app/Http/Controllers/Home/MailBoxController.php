<?php

namespace App\Http\Controllers\Home;

use App\Models\MailBox;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailBoxController extends Controller
{
    //
    public function check(Request $request)
    {
        $uid = $request->uid;
        $activationcode = $request->activationcode;
        $res = MailBox::where('uid',$uid)->get()[0];
        $old = strtotime($res->created_at);
        $new = time();
        $t = $new - $old;
        $code = $res->activationcode;
        MailBox::where('uid',$uid)->delete();
        if($t>60 || ($code != $activationcode)){
            // 删除用户表中用户信息
            User::where('id',$uid)->delete();
            echo '<script>alert("超过验证时间,请重新注册");window.location.href="/home/register"</script>';

        }  else {
            User::where('id',$uid)->update([
                'status'=>1
            ]);
            echo '<script>alert("验证成功3秒后挑战登陆页面");setTimeout(window.location.href="/home/login",3000)</script>';
        }
    }
}
