<?php
namespace App\module\system_localization;

use Illuminate\Support\ServiceProvider;

class SystemLocalizationServiceProvider extends ServiceProvider
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
            require __DIR__.'/general/route/route.php';
        }
    }


    public function bootView(){

        $this->loadViewsFrom(__DIR__.'/admin/view', 'admin.system_localization');
        $this->loadViewsFrom(__DIR__.'/general/view', 'general.system_localization');

//        $this->publishes([
//            __DIR__.'/path/to/views' => base_path('resources/views/vendor/courier'),
//        ]);
    }


    public function bootLang()
    {

        $this->loadTranslationsFrom(__DIR__.'/lang', 'system_localization');

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
$this->loadMigrationsFrom(base_path('app/module/system_localization/database/migration'));
}

public function registerFactory()
{
$this->app->make('Illuminate\Database\Eloquent\Factory')->load(base_path('app/module/system_localization/database/factory'));

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
    'App\module\system_localization\admin\repository\SystemLocalizationContract',
    'App\module\system_localization\admin\repository\EloquentSystemLocalizationRepository'
    );




    $this->app->bind(
    'App\module\system_localization\general\repository\SystemLocalizationContract',
    'App\module\system_localization\general\repository\EloquentSystemLocalizationRepository'
    );




}



}