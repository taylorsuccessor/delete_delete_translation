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

use App\module\read_file\PrepareTextToBeSegment;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/word',function(){
//    $word=new  \App\module\read_file\Docx('project_file/word.docx');
//    echo ($word->getFileText());

//    $pptx=new  \App\module\read_file\Pptx('project_file/ppt3.pptx');
//    echo ($pptx->getFileText());

//    $xlsx=new  \App\module\read_file\Xlsx('project_file/xlsx.xlsx');
//    echo ($xlsx->getFileText());

//    $txt=new  \App\module\read_file\Txt('project_file/txt.txt');
//    echo ($txt->getFileText());

    $filePath='project_file/html.html';

   $getFileSegment=new \App\module\read_file\GetFileSegment($filePath);
    dump($getFileSegment->getSegment());

});
