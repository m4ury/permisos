<?php

namespace App\Events;

use App\Reunion;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReunionCreada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Reunion
     */

    public $reunion;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Reunion $reunion)
    {
        $this->reunion = $reunion;
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
