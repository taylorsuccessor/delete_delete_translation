<?php
namespace App\module\upload_file\listener;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class NotificationEdit implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * NotificationCreate the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //www
    }

    /**
     * Handle the event.
     *
     * @param  PodcastWasPurchased  $event
     * @return void
     */
    public function handle($event)
    {

        notification('edit_upload_file',[
            'user'=>$event->user,
            'oldModel'=>$event->oldModel,
            'newModel'=>$event->newModel,
        ]);

    }
}
