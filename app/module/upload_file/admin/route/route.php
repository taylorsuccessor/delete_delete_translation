<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\upload_file\admin\controller'], function () {

    Route::resource('upload_file','UploadFile');


});


