<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class BlogImg extends Model
{
    //
    protected $fillable = ['bid','img'];
    public function getImgAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
}
