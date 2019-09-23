<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shipment extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'staff_id', 'driver_id', 'status_id', 'package_id',
    ];

    public function staff()
	{
		return $this->belongsTo(User::class, 'staff_id');
	}

	public function driver()
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
