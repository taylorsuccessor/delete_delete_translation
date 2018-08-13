<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\hyperpay\admin\controller'], function () {

    Route::resource('hyperpay','HyperpayResource');


});


Route::get('create_checkout','\App\module\hyperpay\admin\controller\HyperpayResource@createCheckout');
Route::get('hyperpay_handler','\App\module\hyperpay\admin\controller\HyperpayResource@hyperpayHandler');

