<?php
namespace App\module\language;

use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $router->aliasMiddleware('language', 'App\module\language\middleware\ChangeLanguage');

    }


    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }



}