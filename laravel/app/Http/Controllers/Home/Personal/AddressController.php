<?php

namespace App\Http\Controllers\Home\Personal;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // 地址列表
    public function address()
    {
        $add = UserAddress::where('uid',Auth::user()->id)->get();
        return view('home.personal.address')->with('add',$add);
    }

    // 获得地址
    public function getAddress()
    {
        return file_get_contents(public_path('ChinaArea.xml'));
    }

    // 添加地址
    public function editAddress(Request $request)
    {
        // 判断用户是否有收货地址
        $add = UserAddress::where('uid',Auth::user()->id)->get();
        if(isset($add[0])){
            UserAddress::where('uid',Auth::user()->id)
                ->update([
                    'name'=>$request->name,
                    'prov'=>$request->prov,
                    'city'=>$request->city,
                    'area'=>$request->area,
                    'detail'=>$request->detail,
                    'phone'=>$request->phone
                ]);
        } else {
            UserAddress::create($request->all());
        }
        return '<script>alert("保存成功");window.location.href="/home/personal/setting/address"</script>';
    }

    // 删除地址
    public function delAddress()
    {
        UserAddress::where('uid',Auth::user()->id)->delete();
        return '<script>alert("删除成功");window.location.href="/home/personal/setting/address"</script>';
    }
}
