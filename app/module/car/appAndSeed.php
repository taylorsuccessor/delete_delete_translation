
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\car\CarServiceProvider::class,



];


//seed
    $this->call('App\module\car\database\seed\car');


];

