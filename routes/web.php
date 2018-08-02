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

use App\module\segment_helper\PrepareTextToBeSegment;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/word',function(){

    $resultCollection=\App\module\translation\model\Translation::where('created_at','>=',now()->subDay(4))->get();

    \Log::info($resultCollection);

    $totalMatchWithAfterBefore=new \App\module\translate_segment_suggestion\TotalMatchWithAfterBefore('3');
dump($totalMatchWithAfterBefore->getSuggestionList());



//    $googleTranslate=new \App\module\translate_segment_suggestion\GoogleTranslate('man');
//    dump($googleTranslate->getSuggestionList());

    $filePath='project_file/html.html';

   $getFileSegment=new \App\module\segment_helper\GetFileSegment($filePath);
    dump($getFileSegment->getSegment());

});
