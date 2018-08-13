<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'api','as'=>'api.', 'namespace' => '\App\module\project\api\controller'], function () {

    Route::resource('project','Project');


});


