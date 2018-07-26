<?php

namespace App\module\car\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\car\admin\request\createRequest;
use App\module\car\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\car\model\Car as mCar;
use App\module\car\admin\repository\CarContract as rCar;



class Car extends Controller
{
private $rCar;

public function __construct(rCar $rCar)
{
$this->rCar=$rCar;
}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rCar->getByFilter($request,$statistic);

return view('admin.car::index', compact('oResults','request','statistic'));
}

/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('admin.car::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*/
public function store(createRequest $request)
{


$oResults=$this->rCar->create($request->all());

return redirect('admin/car');
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


$car=$this->rCar->show($id);
$request->merge(['car_id'=>$id,'page_name'=>'page']);



return view('admin.car::show', compact('car','request'));
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


$car=$this->rCar->show($id);


return view('admin.car::edit', compact('car'));
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

$result=$this->rCar->update($id,$request);

return redirect(route('admin.car.index'));
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
$car=$this->rCar->destroy($id);
return redirect(route('admin.car.index'));
}


}
