<?php

namespace App\module\upload_file\general\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\upload_file\general\request\createRequest;
use App\module\upload_file\general\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\upload_file\model\UploadFile as mUploadFile;
use App\module\upload_file\general\repository\UploadFileContract as rUploadFile;

use App\module\user\general\repository\UserContract as rUser;
use App\module\upload_file\helper\UploadFile as helperUploadFile;

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



        $oResults=$request->has('upload_group_id')? $this->rUploadFile->getByFilter($request):[];

        $template=$request->has('template')? $request->template:'index';
        return view('general.upload_file::'.$template, compact('oResults','request','statistic'));


    }




    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUser $rUser)
    {

        $userList=$rUser->getAllList();

        return view('general.upload_file::create',compact('request','userList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {

        $helperFileUpload=new HelperUploadFile('upload_file');

        if($helperFileUpload->upload()){

            $request->merge([
                'new_name'=>$helperFileUpload->new_name,
                'upload_base_url'=>env('UPLOAD_BASE_URL'),
                'origin_name'=>$helperFileUpload->file->getClientOriginalName()
                ]);
        }else{
            Redirect::back()->withError($helperFileUpload->errorMessageList);
        }

        $oResults=$this->rUploadFile->create($request->all());

        $request->merge([
            'upload_group_id'=>$oResults->upload_group_id,
            'image_url'=>$oResults->full_file_url,
            ]);


        return redirect('general/upload_file?'.http_build_query($request->all()));

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



        return view('general.upload_file::show', compact('upload_file','request'));
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
        return view('general.upload_file::edit', compact('upload_file','userList'));
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
            return redirect(route('general.upload_file.index'));
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


        return redirect('general/upload_file?'.http_build_query($request->all()));

    }


}
