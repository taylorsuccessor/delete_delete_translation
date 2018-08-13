<?php
namespace App\module\system_localization\listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationCreate implements ShouldQueue
{
    /**
     * NotificationCreate the event listener.
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
     * @param  PodcastWasPurchased  $event
     * @return void
     */
    public function handle( $event)
    {

        notification('create_system_localization',[
            'user'=>$event->user,
            'model'=>$event->model,
        ]);
    }
}
