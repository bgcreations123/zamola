<?php

namespace App\Traits;

use App\Comment;

trait Comments
{
	public function store_comment($comment, $sender)
    {
        // insert into the db
        $comment = new Comment;

        $comment->sender = $sender;
        $comment->comment = $comment;
        // $comment->comment = $request->get('comment');

        $comment->save();
    }
}  