<?php
namespace App\module\user_notification;

use Illuminate\Support\ServiceProvider;

class UserNotificationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootRoute();
        $this->bootView();
        $this->bootLang();
        //   $this->bootConfig();//I add module config file and merge data from register method

    }

    public function bootRoute(){
        if (! $this->app->routesAreCached()) {

            require __DIR__.'/admin/route/route.php';
            require __DIR__.'/api/route/route.php';
        }
    }


    public function bootView(){

        $this->loadViewsFrom(__DIR__.'/admin/view', 'admin.user_notification');
        $this->loadViewsFrom(__DIR__.'/api/view', 'api.user_notification');

//        $this->publishes([
//            __DIR__.'/path/to/views' => base_path('resources/views/vendor/courier'),
//        ]);
    }


    public function bootLang()
    {

        $this->loadTranslationsFrom(__DIR__.'/lang', 'user_notification');

//        $this->publishes([
//            __DIR__.'/path/to/translations' => base_path('resources/lang/vendor/courier'),
//        ]);
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function bootConfig()
    {
//        $this->publishes([
//            __DIR__.'/path/to/config/courier.php' => config_path('courier.php'),
//        ]);
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerRepository();


        $this->registerFactory();
        $this->registerMigration();

    }

    public function registerMigration(){
        $this->loadMigrationsFrom(base_path('app/module/user_notification/database/migration'));
    }

    public function registerFactory()
    {
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(base_path('app/module/user_notification/database/factory'));

    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config.php', 'module'
        );
    }


    public function registerRepository(){

        $this->app->bind(
            'App\module\user_notification\admin\repository\UserNotificationContract',
            'App\module\user_notification\admin\repository\EloquentUserNotificationRepository'
        );




        $this->app->bind(
            'App\module\user_notification\api\repository\UserNotificationContract',
            'App\module\user_notification\api\repository\EloquentUserNotificationRepository'
        );




    }



}