<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    
    function bills()
    {
        return $this->hasMany('App\Bill', 'c_ssn');
    }
	
	function rooms()
	{
		return $this->belongsToMany('App\Room', 'c_ssn');
	}
}
