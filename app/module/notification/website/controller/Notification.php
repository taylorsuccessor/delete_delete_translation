<?php

namespace App\module\notification\website\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\notification\website\request\createRequest;
use App\module\notification\website\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\notification\model\Notification as mNotification;
use App\module\notification\website\repository\NotificationContract as rNotification;



class Notification extends Controller
{
private $rNotification;

public function __construct(rNotification $rNotification)
{
$this->rNotification=$rNotification;
}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rNotification->getByFilter($request,$statistic);

return view('website.notification::index', compact('oResults','request','statistic'));
}

/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('website.notification::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*/
public function store(createRequest $request)
{


$oResults=$this->rNotification->create($request->all());

return redirect('website/notification');
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


$notification=$this->rNotification->show($id);
$request->merge(['notification_id'=>$id,'page_name'=>'page']);



return view('website.notification::show', compact('notification','request'));
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


$notification=$this->rNotification->show($id);


return view('website.notification::edit', compact('notification'));
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

$result=$this->rNotification->update($id,$request);

return redirect(route('website.notification.index'));
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
$notification=$this->rNotification->destroy($id);
return redirect(route('website.notification.index'));
}


}
