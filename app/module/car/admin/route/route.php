<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\car\admin\controller'], function () {

    Route::resource('car','Car');


});


