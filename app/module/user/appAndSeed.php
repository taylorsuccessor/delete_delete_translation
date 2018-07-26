
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\user\UserServiceProvider::class,



];


//seed
    $this->call('App\module\user\database\seed\user');


];

