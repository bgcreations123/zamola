<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    /**
     * Get the data that owns this model.
     * 
     * e.g.
     * 
     * Get the user that owns the order.
     */
    
    public function user()
	{
	    return $this->belongsTo(User::class);
	}

	public function status()
	{
	    return $this->belongsTo(Status::class);
	}
	public function shipment_category()
	{
	    return $this->belongsTo(Shipment_category::class);
	}

	public function payment_method()
	{
	    return $this->belongsTo(Payment_method::class);
	}

	public function shipment()
	{
		return $this->hasMany(Shipment::class);
	}

	public function package()
	{
		return $this->belongsTo(Package::class);
	}

	public function origin()
	{
		return $this->hasOne(Terminus::class, 'order_id')->where(['terminal' => 'origin']);
	}

	public function destination()
	{
		return $this->hasOne(Terminus::class, 'order_id')->where('terminal', 'destination');
	}
}
