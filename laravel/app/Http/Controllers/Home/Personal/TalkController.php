<?php

namespace App\Http\Controllers\Home\Personal;

use App\Libraries\UploadFileName;
use App\Models\Talk;
use App\Models\TalkEvaluate;
use App\Models\TalkImg;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    //
    //我的话题
    public function index(){
        $res = Talk::where('uid',Auth::user()->id)
            ->get();
        return view('home.talk.myTalk')->with('res',$res);
    }

    // 显示添加话题视图
    public function addTalk()
    {
        return view('home.talk.addTalk');
    }

    // 添加话题
    public function add(Request $request)
    {
        // 添加话题
        $talk = Talk::create([
            'uid'=>Auth::user()->id,
            'title'=>$request->title,
            'content'=>$request->message
        ]);
        //  添加话题图片
        if(isset($request->face[0])){
             $imgs = UploadFileName::mulUpload($request->face);
            foreach ($imgs as $i){
                TalkImg::create([
                    'tid' => $talk->id,
                    'img' => $i
                ]);
            }
        }
        return '<script>alert("话题发布成功")</script>';
    }

    //话题遍历
    public function retalk(){
        $res = Talk::select('talks.id as tid','title','icon','talks.updated_at as time','content','u_username')
                    ->leftJoin('user_infos','user_infos.uid','talks.uid')
                    ->leftJoin('users','users.id','talks.uid')
                    ->OrderBy('time','desc')
                    ->paginate(3);
        $d = '';
        foreach($res as $re){
            $img = TalkImg::where('tid',$re->tid)->get();
            foreach ($img as $i){
                $d[$re->tid][] = $i->img;
            }
        }
        return view('home.talk.talk')->with('res',$res)
                                     ->with('d',$d);
    }

    // 话题详情
    public function talkDetail($tid)
    {
        $res = Talk::select('talks.id as tid','title','icon','talks.updated_at as time','content','u_username','users.id as userid')
            ->where('talks.id',$tid)
            ->leftJoin('user_infos','user_infos.uid','talks.uid')
            ->leftJoin('users','users.id','talks.uid')
            ->get()[0];
        $img = TalkImg::where('tid',$tid)->get();
        $d = '';

        foreach ($img as $i){
            $d[] = $i->img;

        }
        if(Auth::check()){
            $img = UserInfo::where('uid',Auth::user()->id)->get();
            if(isset($img[0])){
                $img = $img[0];
            } else {
                $img = null;
            }
        } else {
            $img = null;
        }
        // 查询评价
        $evaluates = TalkEvaluate::select('talk_evaluates.id as tid','icon','talk_evaluates.updated_at as time','content','u_username')
                                 ->where('tid',$tid)
                                 ->leftJoin('user_infos','user_infos.uid','talk_evaluates.uid')
                                 ->leftJoin('users','users.id','talk_evaluates.uid')->get();
        return view('home.talk.talkEvaluate')->with('res',$res)
                                             ->with('d',$d)
                                             ->with('user',$img)
                                             ->with('evaluates',$evaluates);
    }

    // 添加评论
    public function talkEvaluate(Request $request)
    {
        TalkEvaluate::create([
            'uid'=>Auth::user()->id,
            'tid'=>$request->tid,
            'content'=>$request->content,
        ]);
        echo '111';
    }

    // 删除话题
    public function delTalk($tid)
    {
        Talk::where('id',$tid)->delete();
        TalkEvaluate::where('tid',$tid)->delete();
        return '<script>alert("删除成功");window.location.href="/home/personal/talk/index"</script>';
    }
}
