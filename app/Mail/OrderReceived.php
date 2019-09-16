<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\{Order, Terminus};

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $sender_terminus, $receiver_terminus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Terminus $sender_terminus, Terminus $receiver_terminus)
    {
        $this->order = $order;
        $this->sender_terminus = Terminus::where(['order_id' => $order->id, 'terminal' => 'origin'])->first();
        $this->receiver_terminus = Terminus::where(['order_id' => $order->id, 'terminal' => 'destination'])->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()->addTextHeader('Content-Type', 'multipart/mixed');
            $message->getHeaders()->addTextHeader('Content-Transfer-Encoding', 'base64');
        });

        return $this->view('emails.order_received');
    }
}
