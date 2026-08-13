<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order->load('items');
    }

    public function build()
    {
        return $this->subject('New Order #'.$this->order->id)
            ->view('emails.order_placed')
            ->with(['order' => $this->order]);
    }
}
