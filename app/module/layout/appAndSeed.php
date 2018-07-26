
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\layout\LayoutServiceProvider::class,



];


//seed
    $this->call('App\module\layout\database\seed\layout');


];

