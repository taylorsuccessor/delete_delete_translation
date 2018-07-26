<?php

namespace App\module\edit_config\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\edit_config\admin\request\createRequest;
use App\module\edit_config\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\edit_config\model\EditConfig as mEditConfig;
use App\module\edit_config\admin\repository\EditConfigContract as rEditConfig;


use App\module\edit_config\admin\controller\Helper;

class EditConfig extends Controller
{
private $rEditConfig;

public function __construct(rEditConfig $rEditConfig)
{
$this->rEditConfig=$rEditConfig;
}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rEditConfig->getByFilter($request,$statistic);

return view('admin.edit_config::index', compact('oResults','request','statistic'));
}

/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('admin.edit_config::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*
*/

public function store(Request $request)
{


    $helper=new Helper();
    $helper->editConfig($request->all());


    return redirect('admin/edit_config/create');
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


$edit_config=$this->rEditConfig->show($id);
$request->merge(['edit_config_id'=>$id,'page_name'=>'page']);



return view('admin.edit_config::show', compact('edit_config','request'));
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


$edit_config=$this->rEditConfig->show($id);


return view('admin.edit_config::edit', compact('edit_config'));
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

$result=$this->rEditConfig->update($id,$request);

return redirect(route('admin.edit_config.index'));
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
$edit_config=$this->rEditConfig->destroy($id);
return redirect(route('admin.edit_config.index'));
}





}
