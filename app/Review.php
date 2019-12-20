<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'review', 'rate',
    ];

	public function user()
	{
	    return $this->belongsTo(User::class, 'user_id');
	}

	public function order()
	{
	    return $this->belongsTo(Order::class, 'order_id');
	}
}
