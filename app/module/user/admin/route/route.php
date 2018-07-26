<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\user\admin\controller'], function () {

    Route::resource('user','User');


});


