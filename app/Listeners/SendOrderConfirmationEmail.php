<?php

namespace App\Listeners;

use App\Events\OrderRecord;
use App\Mail\OrderMailable;
use App\Mail\OrderMailableAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmationEmail
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderRecord  $event
     * @return void
     */
    public function handle(OrderRecord $event)
    {
         $order=$event->order;

        Mail::to($order->email)->send(new OrderMailable($order));
        Mail::to('yonetici@admin.com')->send(new OrderMailableAdmin($order));
    }
}
