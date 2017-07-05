<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable = ['uid','sex','icon','motto'];
    public function getIconAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
}
