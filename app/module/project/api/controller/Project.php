<?php

namespace App\module\project\api\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\project\api\request\createRequest;
use App\module\project\api\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\project\model\Project as mProject;
use App\module\project\api\repository\ProjectContract as rProject;

    use App\module\user\api\repository\UserContract as rUser;
    
class Project extends Controller
{
    private $rProject;

    public function __construct(rProject $rProject)
    {
        $this->rProject=$rProject;
    }

    /**
    * Display a listing of the resource.
    *
    * @return view as response
    */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rProject->getByFilter($request,$statistic);


        $aResults=[];

        if(count($oResults)){
                foreach($oResults as $oResult){
    $aResults[]=[

    'id'=>  $oResult->id,

    'user_id'=>  $oResult->user_id,

    'name'=>  $oResult->name,

    'from_language'=>  $oResult->from_language,

    'to_language'=>  $oResult->to_language,

    'status'=>  $oResult->status,

    'created_at'=>  $oResult->created_at,

    'updated_at'=>  $oResult->updated_at,

                        ];
        }
    }

        return new JsonResponse(['results'=>$aResults,'count'=>$oResults->total(),'statistic'=>$statistic,'per_page'=>15],200,[],JSON_UNESCAPED_UNICODE);


    }

    /**
    * Show the form for creating a new resource.
    *
    * @return view
    */
    public function create(Request $request,rUser $rUser)
    {

            $userList=$rUser->getAllList();
    
        return view('api.project::create',compact('request','userList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return redirect
    */
    public function store(createRequest $request)
    {


        $oResults=$this->rProject->create($request->all());




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


        $project=$this->rProject->show($id);


          return new JsonResponse(['status'=>'success','model'=>$project],200,[],JSON_UNESCAPED_UNICODE);
        

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    *
    * @return view
    */
    public function edit($id,rUser $rUser)
    {


        $project=$this->rProject->show($id);


            $userList=$rUser->getAllList();
            return view('api.project::edit', compact('project','userList'));
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

        $result=$this->rProject->update($id,$request);


        
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
        $project=$this->rProject->destroy($id);


        
        return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }


}
