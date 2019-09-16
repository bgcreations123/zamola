<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function staff()
	{
		return $this->belongsTo(User::class, 'staff_id');
	}

	public function driver()
	{
		return $this->belongsTo(User::class, 'driver_id');
	}

	public function shipment()
	{
	    return $this->belongsTo(Shipment::class);
	}
}
