<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\vue\admin\controller'], function () {

    Route::resource('vue','Vue');


});


Route::any('json',function(){
    return json_encode([
        "ip"=>"192.168.2.1",
        "rows"=>[
            ['name'=>'my name'],
            ['name'=>'mohammad hashim'],
        ],
    ]);
});