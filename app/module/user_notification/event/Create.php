<?php
namespace App\module\user_notification\event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Create implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model=null;
    /**
     * NotificationCreate a new event instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model=$model;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('App.User.'.$this->model->user_id),
           // new PrivateChannel('admin.channel'),
            ];
    }
}
