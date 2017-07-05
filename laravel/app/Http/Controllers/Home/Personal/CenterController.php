<?php

namespace App\Http\Controllers\Home\Personal;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogImg;
use App\Models\Friend;
use App\Models\ReceiveLetter;
use App\Models\Recipe;
use App\Models\Talk;
use App\Models\TalkImg;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CenterController extends Controller
{
    //

    //个人空间
    public  function index($uid){

        $caipus = Recipe::where('uid',$uid)->get();
        $caipuscount = Recipe::where('uid',$uid)->get()->count();
        $user = User::where('users.id',$uid)->select('users.*','icon','sex')
            ->leftJoin('user_infos','users.id','user_infos.uid')
            ->get();
        if(isset($user[0])){
            $user = $user[0];
        }
        $friend = null;
        if(Auth::check()){
            $friend = Friend::where('fid',$uid)->where('uid',Auth::user()->id)->get();
        }



        return view('home/personal/center/center')->with('caipus',$caipus)
            ->with('user',$user)
            ->with('caipuscount',$caipuscount)
            ->with('friend',$friend);
    }

    // 话题
    public function pai($uid){
        $users = User::where('users.id',$uid)->select('users.*','user_infos.icon')
            ->leftJoin('user_infos','users.id','user_infos.uid')
            ->get();
        foreach ($users as $user)
        {
            $icon = $user->icon;
            $username = $user->u_username;
            $time = $user->updated_at;
        }


        $talkscount = Talk::where('users.id',$uid)->select('talks.*','u_username','icon')
            ->join('users','talks.uid','users.id')
            ->join('user_infos','talks.uid','user_infos.uid')
            ->get()
            ->count();


        $talks = Talk::where('users.id',$uid)->select('talks.*','u_username','icon')
            ->join('users','talks.uid','users.id')
            ->join('user_infos','talks.uid','user_infos.uid')
            ->paginate(2);

        foreach ($talks as $talk)
        {
            $imgs = TalkImg::where('tid',$talk->id)->get();
            if(isset($imgs[0])){
                foreach($imgs as $i)
                {
                    $img[$talk->id][] = $i->img;
                }
            }
        }

        return view('home/personal/center/centerpai') ->with('user',$users[0])
            ->with('talks',$talks)
            ->with('img',$img)
            ->with('talkscount',$talkscount);
    }
    
    // blog
    public function blog($uid){

        $users = User::where('users.id',$uid)->select('users.*','user_infos.icon')
            ->leftJoin('user_infos','users.id','user_infos.uid')
            ->get();
        foreach ($users as $user)
        {
            $icon = $user->icon;
            $username = $user->u_username;
            $time = $user->updated_at;
        }


        $blogs = Blog::where('uid',$uid)->select('blogs.*','u_username')
            ->leftJoin('users','blogs.uid','users.id')
            ->paginate(2);
        $blogscount = Blog::select('blogs.*','u_username')
            ->where('uid',$uid)
            ->join('users','blogs.uid','users.id')
            ->get()
            ->count();
         //$blogimg = '';
        foreach($blogs as $blog)
        {
            $blogimgs = BlogImg::where('bid',$blog->id)->get();
            if (isset($blogimgs[0])){
                $blogimg[$blog->id]['img'] = $blogimgs[0]->img;
            }
        }

        return view('home/personal/center/centerblog')->with('blogs',$blogs)
            ->with('user',$users[0])
            ->with('blogimg',$blogimg)
            ->with('blogscount',$blogscount);
    }

    // 好友
    public function friend($uid)
    {
        $friend = null;
        if(Auth::check()){
            $friend = Friend::where('fid',$uid)->where('uid',Auth::user()->id)->get();
        }
        $user = User::where('users.id',$uid)
                    ->select('users.*','user_infos.icon')
                    ->leftJoin('user_infos','users.id','user_infos.uid')
                    ->get();
        if(isset($user[0])){
            $user = $user[0];
        }
        $friends = Friend::select('fid','u_username','icon')
                         ->where('friends.uid',$uid)
                         ->leftJoin('users','users.id','fid')
                         ->leftJoin('user_infos','user_infos.uid','fid')
                         ->get();
        return view('home/personal/center/friends')->with('user',$user)
                                                      ->with('friend',$friend)
                                                      ->with('friends',$friends);
    }

    // 加关注
    public function addFriend(Request $request)
    {
        Friend::create([
            'uid'=>Auth::user()->id,
            'fid'=>$request->fid,
        ]);
        $content = '用户'.Auth::user()->u_username.'关注你了';
        ReceiveLetter::create([
            'rid'=>$request->fid,
            'sid'=>Admin::all()[0]->id,
            'guard'=>1,
            'content'=>$content,
        ]);;
        return '11';
    }

    // 取消关注
    public function delFriend(Request $request)
    {
        Friend::where('fid',$request->fid)
              ->where('uid',Auth::user()->id)
             ->delete();
        $content = '您的好友'.Auth::user()->u_username.'取消关注您了';
        ReceiveLetter::create([
            'rid'=>$request->fid,
            'sid'=>Admin::all()[0]->id,
            'guard'=>1,
            'content'=>$content,
        ]);;
        return '111';
    }

    // 发送私信
    public function sendLetter(Request $request){
        ReceiveLetter::create([
            'rid'=>$request->fid,
            'sid'=>Auth::user()->id,
            'guard'=>2,
            'content'=>$request->msg
        ]);
        return '1111';
    }
}
