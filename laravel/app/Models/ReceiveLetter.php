<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiveLetter extends Model
{
    //
    protected $fillable = ['rid','sid','guard','content','status'];
}
