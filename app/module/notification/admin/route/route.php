<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\notification\admin\controller'], function () {

    Route::resource('notification','Notification');


});


