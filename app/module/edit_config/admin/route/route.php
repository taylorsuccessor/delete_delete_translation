<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\edit_config\admin\controller'], function () {

    Route::resource('edit_config','EditConfig');

    Route::resource('edit_rate_config','EditRateConfig');


});


