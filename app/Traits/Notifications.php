<?php

namespace App\Traits;

use Auth;
use App\Notification;

trait Notifications
{
	public function store_notice($new_notice, $sender, $receiver, $order_id)
    {
        // insert into the db
        $notice = new Notification;

        $notice->sender_id = $sender;
        $notice->receiver_id = $receiver;
        $notice->order_id = $order_id;
        $notice->notice = $new_notice;
        // $notice->notice = $request->get('notice');

        $notice->save();
    }
}  