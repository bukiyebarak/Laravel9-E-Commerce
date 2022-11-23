<?php

namespace App\Events;

use App\Models\Orderitem;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateProductQuantity
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Orderitem $orderitem;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Orderitem $orderitem)
    {
        $this->orderitem=$orderitem;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
