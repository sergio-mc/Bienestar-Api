<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restriction extends Model
{
    protected $fillable = [
        'fromTime','toTime','user_id','application_id'
    ];
}
