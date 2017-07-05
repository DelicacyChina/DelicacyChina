<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['uid','title','content'];

    public function getIconAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
}
