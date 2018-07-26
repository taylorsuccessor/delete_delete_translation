<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/word',function(){
//    $word=new  \App\module\read_file\Word('project_file/word.docx');
//    echo ($word->convertFileToHtml());
    $word=new  \App\module\read_file\Ppt('project_file/ppt.pptx');
    echo ($word->convertFileToHtml());
});
