<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $incrementing = false;
    
    function bills()
    {
        return $this->hasMany('App\Bill', 'invoice_number');
    }
	
	function clients()
	{
		return $this->belongsToMany('App\Client', 'ssn');
	}
	
	function dorm()
	{
		return $this->belongsTo('App\Dorm', 'id');
	}
	
	function roomType()
	{
		return $this->belongsTo('App\RoomType', 'type_id');
	}
	
	function furnitures()
	{
		return $this->hasMany('App\Furniture', 'r_number');
	}
}
