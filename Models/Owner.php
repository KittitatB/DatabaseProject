<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $incrementing = false;
    
    function dorms()
    {
        return $this->hasMany('App\Dorm', 'o_ssn');
    }
}
