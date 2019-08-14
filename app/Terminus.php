<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminus extends Model
{
    public function order()
	{
	    return $this->belongsTo(Order::class);
	}
}
