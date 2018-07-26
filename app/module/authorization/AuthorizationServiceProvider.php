<?php
namespace App\module\authorization;

use Illuminate\Support\ServiceProvider;
use App\module\auth\authorization\middleware\Authorization;

class AuthorizationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $router->aliasMiddleware('authorization', 'App\module\authorization\middleware\Authorization');

//        $this->bootRoute();
//        $this->bootView();
//        $this->bootLang();
    }


    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
//        $this->registerRepository();
//
//
//        $this->registerFactory();
//        $this->registerMigration();

    }
public function registerConfig(){
    $this->mergeConfigFrom(
        __DIR__.'/config/permission.php', 'permission'
    );

}




}