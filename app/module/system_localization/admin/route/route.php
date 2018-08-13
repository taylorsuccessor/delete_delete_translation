<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'admin','as'=>'admin.', 'namespace' => '\App\module\system_localization\admin\controller'], function () {

    Route::resource('system_localization','SystemLocalization');



});

Route::get(
    'create_vue_translation',
    '\App\module\system_localization\admin\controller\SystemLocalization@createVueTranslation')
     ->name('admin.system_localization.vue_translation');
Route::get('migrate_translate_from_file_to_db',
    '\App\module\system_localization\admin\controller\SystemLocalization@migrateTranslateFromFileToDb')
     ->name('admin.system_localization.migrate_from_file_to_db');
