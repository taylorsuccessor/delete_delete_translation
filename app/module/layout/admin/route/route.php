<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin', 'namespace' => '\App\module\layout\admin\controller'], function () {

    Route::resource('layout','Layout');
    Route::get('admin-vue','Layout@vueAdmin');


});


