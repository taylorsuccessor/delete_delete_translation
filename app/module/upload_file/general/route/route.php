<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'general','as'=>'general.', 'namespace' => '\App\module\upload_file\general\controller'], function () {

    Route::resource('upload_file','UploadFile');


});


