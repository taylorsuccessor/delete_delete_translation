<?php
namespace App\module\authentication;

use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->bootRoute();
        $this->bootView();
        $this->bootLang();

        $router->aliasMiddleware('authentication.api', 'App\module\authentication\middleware\ApiAuthentication');

     //   $this->bootConfig();//I add module config file and merge data from register method

    }

    public function bootRoute(){
        if (! $this->app->routesAreCached()) {

            require __DIR__.'/admin/route/route.php';
        }
    }


    public function bootView(){

        $this->loadViewsFrom(__DIR__.'/admin/view', 'admin.authentication');

//        $this->publishes([
//            __DIR__.'/path/to/views' => base_path('resources/views/vendor/courier'),
//        ]);
    }


    public function bootLang()
    {
        $this->loadTranslationsFrom(__DIR__.'/lang', 'authentication');

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


}

public function registerMigration(){
$this->loadMigrationsFrom(base_path('app/module/authentication/database/migration'));
}

public function registerFactory()
{
$this->app->make('Illuminate\Database\Eloquent\Factory')->load(base_path('app/module/authentication/database/factory'));

}

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'module'
        );
        $this->mergeConfigFrom(
            __DIR__.'/config/auth.php', 'auth'
        );
    }


public function registerRepository(){

    $this->app->bind(
    'App\module\authentication\admin\repository\AuthenticationContract',
    'App\module\authentication\admin\repository\EloquentAuthenticationRepository'
    );




}



}