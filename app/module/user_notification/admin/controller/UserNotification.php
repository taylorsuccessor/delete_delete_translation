<?php

namespace App\module\user_notification\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\user_notification\admin\request\createRequest;
use App\module\user_notification\admin\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\user_notification\model\UserNotification as mUserNotification;
use App\module\user_notification\admin\repository\UserNotificationContract as rUserNotification;

    use App\module\user\admin\repository\UserContract as rUser;
    
class UserNotification extends Controller
{
    private $rUserNotification;

    public function __construct(rUserNotification $rUserNotification)
    {
        $this->rUserNotification=$rUserNotification;
    }

    /**
    * Display a listing of the resource.
    *
    * @return view as response
    */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rUserNotification->getByFilter($request,$statistic);

        if(!isset($request->ajaxRequest)){
            return view('admin.user_notification::index', compact('oResults','request','statistic'));
        }


        $aResults=[];

        if(count($oResults)){
                foreach($oResults as $oResult){
    $aResults[$oResult->id]=[

    'id'=>  $oResult->id,

    'user_id'=>  $oResult->user_id,

    'title'=>  $oResult->title,

    'body'=>  $oResult->body,

    'url'=>  $oResult->url,

    'is_read'=>  $oResult->is_read,

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
    
        return view('admin.user_notification::create',compact('request','userList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return redirect
    */
    public function store(createRequest $request)
    {


        $oResults=$this->rUserNotification->create($request->all());

        if(!isset($request->ajaxRequest)){
            return redirect('admin/user_notification');
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


        $user_notification=$this->rUserNotification->show($id);

        if(isset($request->ajaxRequest)){
            return new JsonResponse(['status'=>'success','data'=>$user_notification],200,[],JSON_UNESCAPED_UNICODE);
        }



        $request->merge(['user_notification_id'=>$id,'page_name'=>'page']);


    
        return view('admin.user_notification::show', compact('user_notification','request'));
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


        $user_notification=$this->rUserNotification->show($id);


            $userList=$rUser->getAllList();
            return view('admin.user_notification::edit', compact('user_notification','userList'));
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

        $result=$this->rUserNotification->update($id,$request);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.user_notification.index'));
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
        $user_notification=$this->rUserNotification->destroy($id);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.user_notification.index'));
    }

    return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }

    public  function markUserNotificationAsRead(){
         $result= $this->rUserNotification->markUserNotificationAsRead();

//         $status=$result? 'success':'error';
//         return new JsonResponse(['status'=>$status]);

         return Redirect::back();
    }

}
