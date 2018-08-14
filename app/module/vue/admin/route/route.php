<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\vue\admin\controller'], function () {

    Route::get('/vue/get_setting','Vue@getSetting');
    Route::resource('vue','Vue');


});

