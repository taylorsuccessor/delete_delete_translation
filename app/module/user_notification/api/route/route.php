<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'api','as'=>'api.', 'namespace' => '\App\module\user_notification\api\controller'], function () {

    Route::resource('user_notification','UserNotification');


});


