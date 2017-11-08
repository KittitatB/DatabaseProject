<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $incrementing = false;
    
    function rooms()
    {
        return $this->hasMany('App\Room', 'room_number');
    }
}
