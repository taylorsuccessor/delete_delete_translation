<?php

namespace App\module\vue\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\module\vue\admin\request\createRequest;
use App\module\vue\admin\request\editRequest;
use Psy\Util\Json;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\vue\model\Vue as mVue;
use App\module\vue\admin\repository\VueContract as rVue;



class Vue extends Controller
{
    private $rVue;

    public function __construct(rVue $rVue)
    {
        $this->rVue=$rVue;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rVue->getByFilter($request,$statistic);

        return new JsonResponse(['results'=>$oResults->all(),'count'=>$oResults->total(),'per_page'=>15],200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.vue::create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rVue->create($request->all());

        $statusCode = ($oResults)? 200:500;
        return new JsonResponse(['data'=>$oResults],$statusCode);
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


        $vue=$this->rVue->show($id);
        $request->merge(['vue_id'=>$id,'page_name'=>'page']);

        return new JsonResponse(['data'=>$vue->toArray()],200);

        return view('admin.vue::show', compact('vue','request'));
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


        $vue=$this->rVue->show($id);


        return view('admin.vue::edit', compact('vue'));
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

        $oResults=$this->rVue->update($id,$request);


        $statusCode = ($oResults)? 200:500;
        return new JsonResponse(['data'=>$oResults],$statusCode);
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
        $vue=$this->rVue->destroy($id);

        return new JsonResponse(['status'=>'success'],200);
    }

    public function getSetting(){


        return new JsonResponse(['user'=>'success slkdfjsdf87dsf'],200);
    }

}
