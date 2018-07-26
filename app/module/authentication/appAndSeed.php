
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\authentication\AuthenticationServiceProvider::class,



];


//seed
    $this->call('App\module\authentication\database\seed\authentication');


];

