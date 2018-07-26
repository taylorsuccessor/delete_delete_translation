<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\authentication\admin\controller'], function () {







});




Route::group(['middleware' => [],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\authentication\admin\controller'], function () {

    Route::get('login','LoginController@showLoginForm')->name('login');
    Route::post('login','LoginController@login');

    Route::get('logout','LoginController@logout')->name('logout');



    Route::get('register','RegisterController@showRegistrationForm');
    Route::post('register','RegisterController@register');



    Route::get('password/request','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/request','ForgotPasswordController@sendResetLinkEmail');


    Route::get('password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/{token}','ResetPasswordController@reset');



});



Route::group(['middleware' => [],'prefix' => 'api','as'=>'api.', 'namespace' => '\App\module\authentication\admin\api'], function () {

    Route::any('v1/login','LoginController@login');

});
