<?php
namespace App\module\layout\admin\controller;

use App\module\user_notification\model\UserNotification;
use  App\module\user_notification\admin\repository\EloquentUserNotificationRepository as rUserNotification;
class Notification{

    public function getNotificationList(){
        $userNotificationResults= UserNotification::where('user_id','=',\Auth::user()->id)
            ->where('is_read','=',false)
            ->orderBy('id','desc')->limit(7)->get();

        $userNotificationList=[];

        foreach($userNotificationResults as $userNotification){


            $userNotificationList[]=[
                'title'=>$userNotification->title,
                'link'=>$userNotification->url,
                'img'=>$this->selectNotificationIcon($userNotification),
                'description'=>$userNotification->body,
                'date'=>$userNotification->created_at,
                'is_read'=>$userNotification->is_read,

            ];
        }

        return $userNotificationList;
    }

    private function selectNotificationIcon(&$userNotification){
        $img='icon-bell';
        if(starts_with($userNotification->url,'/admin/hyperpay')){
            $img='icon-credit-card';
        }elseif(starts_with($userNotification->url,'/admin/user')){
            $img='icon-user';
        }
        return $img;
    }
}