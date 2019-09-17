<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function sender()
	{
		return $this->belongsTo(User::class, 'sender_id');
	}

	public function receiver()
	{
		return $this->belongsTo(User::class, 'receiver_id');
	}

	public function shipment()
	{
	    return $this->belongsTo(Shipment::class);
	}
}
