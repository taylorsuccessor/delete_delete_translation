<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\user_notification\admin\controller'], function () {

    Route::resource('user_notification','UserNotification');
    Route::get('markUserNotificationAsRead','UserNotification@markUserNotificationAsRead')->name('user_notification.mark_as_reead');


});


