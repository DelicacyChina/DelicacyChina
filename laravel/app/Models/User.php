<?php

namespace App\Models;

use App\Libraries\UploadFileName;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    //
    protected $fillable = ['u_username','u_email','password','status','remember_token'];
    public function getIconAttribute($value)
    {
        if(isset($value)){
            return '/'.UploadFileName::imgUrl($value);
        } else {
            return null;
        }
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
