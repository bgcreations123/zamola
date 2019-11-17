<?php

namespace App\Traits;

use Auth;
use App\Comment;

trait Comments
{
	public function store_comment($notice, $sender, $receiver, $order_id)
    {
        // insert into the db
        $comment = new Comment;

        $comment->sender_id = $sender;
        $comment->receiver_id = $receiver;
        $comment->order_id = $order_id;
        $comment->comment = $notice;
        // $comment->comment = $request->get('comment');

        $comment->save();
    }
}  