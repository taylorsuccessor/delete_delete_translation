<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\translation\admin\controller'], function () {

    Route::resource('translation','Translation');


});


