<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'general','as'=>'general.', 'namespace' => '\App\module\system_localization\general\controller'], function () {

    Route::resource('system_localization','SystemLocalization');


});


