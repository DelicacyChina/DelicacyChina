<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = ['recipe_name','introduction','face','uid','nd','kw','gy','hs','cj','status','comment','tips'];

    public function getFaceAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
}
