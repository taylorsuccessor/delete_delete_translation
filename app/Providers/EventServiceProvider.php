<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\module\car\event\Create' =>[
            'App\module\car\listener\NotificationCreate'
        ],
        'App\module\car\event\Edit' =>[
            'App\module\car\listener\NotificationEdit'
        ],
        'App\module\car\event\Delete' =>[
            'App\module\car\listener\NotificationDelete'
        ],


        'App\module\hyperpay\event\Edit' =>[
            'App\module\hyperpay\listener\NotificationEdit'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
