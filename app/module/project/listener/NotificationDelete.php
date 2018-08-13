<?php
namespace App\module\project\listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationDelete implements ShouldQueue
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

        notification('delete_project',[
            'user'=>$event->user,
            'model'=>$event->model,
        ]);
    }
}
