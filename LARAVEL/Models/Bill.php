<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $incrementing = false;
    
    function client()
    {
        return $this->belongsTo('App\Client', 'ssn');
    }
	
	function room()
	{
		return $this->belongsTo('App\Room', 'invoice');
	}
	
	function dorm()
	{
		return $this->belongsTo('App\Dorm', 'id');
	}
}
