<?php

namespace App\Libraries;

use App\Models\UserInfo;

class UploadFileName
{
    // 制造上传路径
    public static function imgName()
    {
        date_default_timezone_set('PRC');
        $dir = 'uploads/';
        $dir .= date('Y/m/d');
        if( !file_exists($dir)) {
            mkdir($dir,0777,true);
        }
        $filename = date('Ymd').uniqid();
        return [
            'filename' => $filename,
            'filedir' => $dir
        ];
    }

    //  匹配数据
    public static function match($type,$arr=['jpg','jpeg','png','gif'])
    {
        return in_array($type,$arr);
    }

    // 解析文件名
    public static function imgUrl($filename)
    {
        $dir = 'uploads/';
        $dir .= substr($filename,0,4).'/';
        $dir .= substr($filename,4,2).'/';
        $dir .= substr($filename,6,2).'/';
        $dir .= $filename;
        return $dir;
    }

    // 上传文件
    public static function upload($upload)
    {
        // 获取后缀
        $suffix = $upload->getClientOriginalExtension();
        // 判断上传类型是否正确
        if(!UploadFileName::match($suffix)){
            echo "<script>alert('上传类型不正确');history.go(-1);</script>";
            die;
        }

        // 获取上传路径 和 上传文件名
        $fileInfo= UploadFileName::imgName();
        $filename = $fileInfo['filename'].'.'.$suffix;
        // 上传文件
        $info = $upload->move($fileInfo['filedir'],$filename);
        return $filename;
    }

    // 多图上传
    public static function mulUpload($imgs)
    {
          foreach ($imgs as $img)
          {
              $filaname[] = UploadFileName::upload($img);
          }
          return $filaname;

    }

    // 查询头像
    public static function icon($id)
    {
        $icon = UserInfo::select('icon')->where('uid',$id)->get();
        if(isset($icon[0])){
            return $icon[0]->icon;
        } else {
            return null;
        }
    }
}
