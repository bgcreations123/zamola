<?php

namespace App\Traits;

use Auth;
use App\Comment;

trait Comments
{
	public function store_comment($request, $sender, $receiver, $shipment_id)
    {
        // insert into the db
        $comment = new Comment;

        $comment->sender_id = $sender;
        $comment->receiver_id = $receiver;
        $comment->shipment_id = $shipment_id;
        $comment->comment = $request->get('comment');

        $comment->save();
    }
}  