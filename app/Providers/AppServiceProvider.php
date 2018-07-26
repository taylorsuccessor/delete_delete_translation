<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        \Illuminate\Support\Facades\Schema::defaultStringLength(191);


        if($this->app->environment('local','testing')){
            $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
        }

//        \DB::listen(function ($query) {
//           echo
//          '<br><br><br><br>'.
//           $query->sql.
//          '<br><br><br><br>'.
//             join('_',$query->bindings).
//          '<br><br><br><br>'.
//             $query->time;
//        });
    }
}
