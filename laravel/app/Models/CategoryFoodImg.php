<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class CategoryFoodImg extends Model
{
    //
    protected $fillable = ['food_id','img_url'];

    // 改变返回路径
    public function getImgUrlAttribute($value)
    {
        if(isset($value)){
            return UploadFileName::imgUrl($value);
        } else {
            return null;
        }

    }
}
