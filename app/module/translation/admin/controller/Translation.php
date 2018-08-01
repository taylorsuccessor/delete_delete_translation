<?php

namespace App\module\translation\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\translation\admin\request\createRequest;
use App\module\translation\admin\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\translation\model\Translation as mTranslation;
use App\module\translation\admin\repository\TranslationContract as rTranslation;



class Translation extends Controller
{
private $rTranslation;

public function __construct(rTranslation $rTranslation)
{
$this->rTranslation=$rTranslation;
}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rTranslation->getByFilter($request,$statistic);

if(!isset($request->ajaxRequest)){
return view('admin.translation::index', compact('oResults','request','statistic'));
}


$aResults=[];

if(count($oResults)){
foreach($oResults as $oResult){
$aResults[$oResult->id]=[

    'id'=>  $oResult->id,

    'translate_en'=>  $oResult->translate_en,

    'translate_ar'=>  $oResult->translate_ar,

    'translate_before_en'=>  $oResult->translate_before_en,

    'translate_after_en'=>  $oResult->translate_after_en,

    'translate_before_ar'=>  $oResult->translate_before_ar,

    'translate_after_ar'=>  $oResult->translate_after_ar,

    'user_id'=>  $oResult->user_id,

    'status'=>  $oResult->status,

];
}
}

return new JsonResponse(['data'=>$aResults,'total'=>$oResults->total(),'statistic'=>$statistic],200,[],JSON_UNESCAPED_UNICODE);


}

/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('admin.translation::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*/
public function store(createRequest $request)
{


$oResults=$this->rTranslation->create($request->all());

if(!isset($request->ajaxRequest)){
return redirect('admin/translation');
}


return new JsonResponse(['status'=>'success','data'=>$oResults],200,[],JSON_UNESCAPED_UNICODE);

}

/**
* Display the specified resource.
*
* @param  int  $id
*
* @return view
*/
public function show($id,Request $request)
{


$translation=$this->rTranslation->show($id);



if(isset($request->ajaxRequest)){
return new JsonResponse(['status'=>'success','data'=>$translation],200,[],JSON_UNESCAPED_UNICODE);
}



$request->merge(['translation_id'=>$id,'page_name'=>'page']);



return view('admin.translation::show', compact('translation','request'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
*
* @return view
*/
public function edit($id)
{


$translation=$this->rTranslation->show($id);


return view('admin.translation::edit', compact('translation'));
}

/**
* Update the specified resource in storage.
*
* @param  int  $id
*
* @return redirect
*/
public function update($id, editRequest $request)
{

$result=$this->rTranslation->update($id,$request);

if(!isset($request->ajaxRequest)){
return redirect(route('admin.translation.index'));
}

return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);


}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
*
* @return redirect
*/
public function destroy($id,Request $request)
{
$translation=$this->rTranslation->destroy($id);

if(!isset($request->ajaxRequest)){
return redirect(route('admin.translation.index'));
}


return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
}


}
