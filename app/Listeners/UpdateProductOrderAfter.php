<?php

namespace App\Listeners;

use App\Events\UpdateProductQuantity;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateProductOrderAfter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UpdateProductQuantity  $event
     * @return void
     */
    public function handle(UpdateProductQuantity $event)
    {
        $orderitem=$event->orderitem;
//        dd($orderitem);
//       Product::find($orderitem->product_id)->decrement('quantity',3);

    }
}
