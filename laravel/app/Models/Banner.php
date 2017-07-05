<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $guarded = ['_token'];

    // 改变返回路径
    public function getFaceImgAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }

    }

    //  返回banner路径
    public function getBannerImgAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
}
