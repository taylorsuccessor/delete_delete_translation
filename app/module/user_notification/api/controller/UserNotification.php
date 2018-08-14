<?php

namespace App\module\user_notification\api\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\user_notification\api\request\createRequest;
use App\module\user_notification\api\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\user_notification\model\UserNotification as mUserNotification;
use App\module\user_notification\api\repository\UserNotificationContract as rUserNotification;

    use App\module\user\api\repository\UserContract as rUser;
    
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
    public function index(){
        $userNotificationResults= mUserNotification::where('user_id','=',\Auth::user()->id)
            ->where('is_read','=',false)
            ->orderBy('id','desc')->limit(7)->get();

        $userNotificationList=[];

        foreach($userNotificationResults as $userNotification){


            $userNotificationList[]=[
                'title'=>$userNotification->title,
                'url'=>$userNotification->url,
                'img'=>'',
                'body'=>$userNotification->body,
                'created_at'=>$userNotification->created_at,
                'is_read'=>$userNotification->is_read,

            ];
        }

        return $userNotificationList;
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return view
    */
    public function create(Request $request,rUser $rUser)
    {

            $userList=$rUser->getAllList();
    
        return view('api.user_notification::create',compact('request','userList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return redirect
    */
    public function store(createRequest $request)
    {


        $oResults=$this->rUserNotification->create($request->all());




        return new JsonResponse(['status'=>'success','model'=>$oResults],200,[],JSON_UNESCAPED_UNICODE);
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


        $model=$this->rUserNotification->show($id);


                    return new JsonResponse(['status'=>'success','model'=>$model],200,[],JSON_UNESCAPED_UNICODE);
        


        $request->merge(['user_notification_id'=>$id,'page_name'=>'page']);


    
        return view('api.user_notification::show', compact('model','request'));
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
            return view('api.user_notification::edit', compact('user_notification','userList'));
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


        
        return new JsonResponse(['status'=>'success','model'=>$result],200,[],JSON_UNESCAPED_UNICODE);

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


        
        return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }


}
