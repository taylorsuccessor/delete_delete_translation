<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\role\admin\controller'], function () {

    Route::resource('role','Role');


});

