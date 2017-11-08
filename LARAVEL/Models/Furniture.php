<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $incrementing = false;
    
    function room()
    {
        return $this->belongsTo('App\Room', 'room_number');
    }
}
