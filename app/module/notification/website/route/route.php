<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => '\App\module\notification\website\controller'], function () {

    Route::resource('notification','Notification');


});


