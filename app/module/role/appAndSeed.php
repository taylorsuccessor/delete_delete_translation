
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\role\RoleServiceProvider::class,



];


//seed
    $this->call('App\module\role\database\seed\role');


];

