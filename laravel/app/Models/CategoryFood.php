<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    //
    protected $guarded = ['_token'];
    public function getImgUrlAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }

    }
}
