<?php
namespace App\module\upload_file;

use Illuminate\Support\ServiceProvider;

class UploadFileServiceProvider extends ServiceProvider
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

        $this->loadViewsFrom(__DIR__.'/admin/view', 'admin.upload_file');
        $this->loadViewsFrom(__DIR__.'/general/view', 'general.upload_file');

//        $this->publishes([
//            __DIR__.'/path/to/views' => base_path('resources/views/vendor/courier'),
//        ]);
    }


    public function bootLang()
    {

        $this->loadTranslationsFrom(__DIR__.'/lang', 'upload_file');

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
$this->loadMigrationsFrom(base_path('app/module/upload_file/database/migration'));
}

public function registerFactory()
{
$this->app->make('Illuminate\Database\Eloquent\Factory')->load(base_path('app/module/upload_file/database/factory'));

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
    'App\module\upload_file\admin\repository\UploadFileContract',
    'App\module\upload_file\admin\repository\EloquentUploadFileRepository'
    );




    $this->app->bind(
    'App\module\upload_file\general\repository\UploadFileContract',
    'App\module\upload_file\general\repository\EloquentUploadFileRepository'
    );




}



}