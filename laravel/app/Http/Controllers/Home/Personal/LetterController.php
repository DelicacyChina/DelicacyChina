<?php

namespace App\Http\Controllers\Home\Personal;

use App\Models\ReceiveLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LetterController extends Controller
{
    //
    public function index()
    {
        $letters = ReceiveLetter:: select('receive_letters.id as lid','u_username','content','receive_letters.status as s','receive_letters.updated_at as time')
                                ->where('rid',Auth::user()->id)
                                ->where('guard',2)
                                ->leftJoin('users','users.id','sid')
                                ->orderBy('s')
                                ->orderBy('time','desc')
                                ->get();
        $count = ReceiveLetter::select(DB::Raw('count(id) as count'))->where('rid',Auth::user()->id)
                                ->where('guard',2)
                                ->where('status',0)
                                ->get()->toArray();
        $n[0] = $count[0]['count'];
        $count = ReceiveLetter::select(DB::Raw('count(id) as count'))->where('rid',Auth::user()->id)
            ->where('guard',2)
            ->where('status',1)
            ->get()->toArray();
        $n[1] = $count[0]['count'];
        return view('home.personal.letter.personalLetter')->with('letters',$letters)
                                                          ->with('count',$n);
    }

    //
    public function sysindex()
    {
        $count = ReceiveLetter::select(DB::Raw('count(id) as count'))->where('rid',Auth::user()->id)
            ->where('guard',1)
            ->where('status',0)
            ->get()->toArray();
        $n[0] = $count[0]['count'];
        $count = ReceiveLetter::select(DB::Raw('count(id) as count'))->where('rid',Auth::user()->id)
            ->where('guard',1)
            ->where('status',1)
            ->get()->toArray();
        $n[1] = $count[0]['count'];
        $letters = ReceiveLetter::where('rid',Auth::user()->id)
                                ->where('guard',1)
                                ->orderBy('status')
                                ->orderBy('updated_at','desc')
                                ->get();
        return view('home.personal.letter.sysLetter')->with('letters',$letters)
                                                     ->with('count',$n);
    }

    // 显示详情
    public function show($id)
    {
        $letter = ReceiveLetter::where('id',$id)->get()[0];
        // 更新为已读
        ReceiveLetter::where('id',$id)->update(['status'=>1]);
        return view('home.personal.letter.letterDetail')->with('letter',$letter);
    }

    // 删除私信
    public function del($id)
    {
        ReceiveLetter::where('id',$id)->delete();
        return '<script>alert("删除成功");self.location=document.referrer;</script>';
    }
}
