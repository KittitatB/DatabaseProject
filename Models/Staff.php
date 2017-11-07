<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $incrementing = false;
    
    function dorm()
    {
        return $this->belongsTo('App\Dorm', 'id');
    }
}
