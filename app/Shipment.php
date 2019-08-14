<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shipment extends Model
{
    public function user()
	{
		return $this->belongsTo(User::class, 'driver_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

    public function package()
	{
		return $this->belongsTo(Package::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
