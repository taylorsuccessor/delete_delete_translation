<?php

namespace App\module\upload_file\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\upload_file\admin\request\createRequest;
use App\module\upload_file\admin\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\upload_file\model\UploadFile as mUploadFile;
use App\module\upload_file\admin\repository\UploadFileContract as rUploadFile;

    use App\module\user\admin\repository\UserContract as rUser;
    
class UploadFile extends Controller
{
    private $rUploadFile;

    public function __construct(rUploadFile $rUploadFile)
    {
        $this->rUploadFile=$rUploadFile;
    }

    /**
    * Display a listing of the resource.
    *
    * @return view as response
    */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rUploadFile->getByFilter($request,$statistic);

        if(!isset($request->ajaxRequest)){
            return view('admin.upload_file::index', compact('oResults','request','statistic'));
        }


        $aResults=[];

        if(count($oResults)){
                foreach($oResults as $oResult){
    $aResults[$oResult->id]=[

    'id'=>  $oResult->id,

    'user_id'=>  $oResult->user_id,

    'upload_group_id'=>  $oResult->upload_group_id,

    'name'=>  $oResult->name,

    'original_name'=>  $oResult->original_name,

    'new_name'=>  $oResult->new_name,

    'upload_base_url'=>  $oResult->upload_base_url,

    'detail'=>  $oResult->detail,

    'created_at'=>  $oResult->created_at,

    'updated_at'=>  $oResult->updated_at,

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
    public function create(Request $request,rUser $rUser)
    {

            $userList=$rUser->getAllList();
    
        return view('admin.upload_file::create',compact('request','userList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return redirect
    */
    public function store(createRequest $request)
    {


        $oResults=$this->rUploadFile->create($request->all());

        if(!isset($request->ajaxRequest)){
            return redirect('admin/upload_file');
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


        $upload_file=$this->rUploadFile->show($id);

        if(isset($request->ajaxRequest)){
            return new JsonResponse(['status'=>'success','data'=>$upload_file],200,[],JSON_UNESCAPED_UNICODE);
        }



        $request->merge(['upload_file_id'=>$id,'page_name'=>'page']);


    
        return view('admin.upload_file::show', compact('upload_file','request'));
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


        $upload_file=$this->rUploadFile->show($id);


            $userList=$rUser->getAllList();
            return view('admin.upload_file::edit', compact('upload_file','userList'));
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

        $result=$this->rUploadFile->update($id,$request);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.upload_file.index'));
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
        $upload_file=$this->rUploadFile->destroy($id);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.upload_file.index'));
    }

    return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }


}
