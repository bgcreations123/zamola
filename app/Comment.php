<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'shipment_id', 'comment',
    ];

    public function sender()
	{
		return $this->belongsTo(User::class, 'sender_id');
	}

	public function receiver()
	{
		return $this->belongsTo(User::class, 'receiver_id');
	}

	public function order()
	{
	    return $this->belongsTo(Order::class, 'order_id');
	}
}
