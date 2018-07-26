<?php

namespace App\module\authentication\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\authentication\admin\request\createRequest;
use App\module\authentication\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\authentication\model\Authentication as mAuthentication;
use App\module\authentication\admin\repository\AuthenticationContract as rAuthentication;



class Authentication extends Controller
{
private $rAuthentication;

public function __construct(rAuthentication $rAuthentication)
{
$this->rAuthentication=$rAuthentication;
}

/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rAuthentication->getByFilter($request,$statistic);

return view('admin.authentication::index', compact('oResults','request','statistic'));
}

/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('admin.authentication::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*/
public function store(createRequest $request)
{


$oResults=$this->rAuthentication->create($request->all());

return redirect('admin/authentication');
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


$authentication=$this->rAuthentication->show($id);
$request->merge(['authentication_id'=>$id,'page_name'=>'page']);



return view('admin.authentication::show', compact('authentication','request'));
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


$authentication=$this->rAuthentication->show($id);


return view('admin.authentication::edit', compact('authentication'));
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

$result=$this->rAuthentication->update($id,$request);

return redirect(route('admin.authentication.index'));
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
*
* @return redirect
*/
public function destroy($id)
{
$authentication=$this->rAuthentication->destroy($id);
return redirect(route('admin.authentication.index'));
}


}
