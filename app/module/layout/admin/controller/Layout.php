<?php

namespace App\module\layout\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\layout\admin\request\createRequest;
use App\module\layout\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\layout\model\Layout as mLayout;
use App\module\layout\admin\repository\LayoutContract as rLayout;



class Layout extends Controller
{
private $rLayout;

public function __construct(rLayout $rLayout)
{
$this->rLayout=$rLayout;
}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{

$statistic=null;
$oResults=$this->rLayout->getByFilter($request,$statistic);

return view('admin.layout::index', compact('oResults','request','statistic'));
}

    /**
     * this is base view for vue admin
     * @param Request $request
     * @return View
     */
    public function vueAdmin(Request $request){


        $statistic=null;


        return view('admin.layout::vue.admin.layout.admin', compact('request','statistic'));
    }
/**
* Show the form for creating a new resource.
*
* @return view
*/
public function create(Request $request)
{


return view('admin.layout::create',compact('request'));
}

/**
* Store a newly created resource in storage.
*
* @return redirect
*/
public function store(createRequest $request)
{


$oResults=$this->rLayout->create($request->all());

return redirect('admin/layout');
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


$layout=$this->rLayout->show($id);
$request->merge(['layout_id'=>$id,'page_name'=>'page']);



return view('admin.layout::show', compact('layout','request'));
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


$layout=$this->rLayout->show($id);


return view('admin.layout::edit', compact('layout'));
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

$result=$this->rLayout->update($id,$request);

return redirect(route('admin.layout.index'));
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
$layout=$this->rLayout->destroy($id);
return redirect(route('admin.layout.index'));
}


}
