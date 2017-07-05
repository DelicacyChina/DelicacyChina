<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Database\Eloquent\Model;

class TalkEvaluate extends Model
{
    //
    protected $fillable = ['uid','tid','content','pid'];

    public function getIconAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }



}
