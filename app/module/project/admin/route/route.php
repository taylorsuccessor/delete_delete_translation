<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\project\admin\controller'], function () {

    Route::resource('project','Project');


});


