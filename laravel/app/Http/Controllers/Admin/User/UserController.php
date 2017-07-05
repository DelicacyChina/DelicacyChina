<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    // 显示菜单的一级列表
    public function index($pid = 0)
    {
        $users = User::paginate(3);
        $res = User::find($pid);
        return view('admin.user.user',['users'=>$users,'p'=>$res]);
    }

    //添加用户
    public function add(Request $request)
    {
        $res = User::create($request->all());
        echo $res->id;

    }

    //改变状态
    public function changeStatus(Request $request){
        $status = $request->all()['status'] == 1? 0:1;
        $res = User::where('id',$request->all()['id'])
            ->update(['status'=>$status]);
        echo '11';
    }

    // 查找
    public function findRecipe(Request $request){
        $res = User::find($request->all()['id']);
        echo $res;
    }

    // 修改
    public function edit(Request $request){
        $status = $request->all()['status'];
        $res = User::where('id',$request->id)
            ->update([
                'u_username'=>$request->all()['u_username'],
                'u_email'=>$request->all()['u_email'],
                // 'password'=>$request->all()['password'],
                'status'=>$status
            ]);
        // dd(11111);
        echo $res;

    }

    //  删除
    public function del(Request $request){
        $user = User::find($request->all()['id'])->delete();
        echo $request->all()['id'];
    }
}
