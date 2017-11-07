<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    public $incrementing = false;
    
    function owner()
    {
        return $this->belongsTo('App\Owner', 'ssn');
    }
	
	function staffs()
	{
		return $this->hasMany('App\Staff', 'd_id');
	}
	
	function bills()
	{
		return $this->hasMany('App\Bill', 'd_id');
	}
	
	function dormExpense()
	{
		return $this->hasOne('App\DormExpense', 'datetime');
	}
}
