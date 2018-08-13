<?php

namespace App\module\notification\admin\controller;

use App\module\notification\admin\controller\sms\SendSms;
use App\module\notification\admin\controller\email\SendEmail;
use App\module\notification\admin\controller\ios\PushNotification as sendIos;
use App\module\notification\admin\controller\android\PushNotification as sendAndroid;


use App\module\notification\model\Notification as mNotification;
use App\module\notification\admin\repository\EloquentNotificationRepository as rNotification;

use App\module\user_notification\admin\repository\EloquentUserNotificationRepository as rUserNotification;
class SendNotification {


   public   function  send($name,$data)
   {
      $oNotification =new rNotification();

      $oNotification=$oNotification->getByFilter(['name'=>$name,'language'=>config('app.locale')]);

      if(!count($oNotification)){return false;}


      foreach($oNotification as $notificationRow){

         if($notificationRow->type=='email'){
            $this->email($notificationRow,$data);
         }elseif($notificationRow->type=='sms'){

            $this->sms($notificationRow,$data);
         }elseif($notificationRow->type=='notification'){

            $this->android($notificationRow,$data);
            $this->ios($notificationRow,$data);
         }elseif($notificationRow->type=='socket'){
             $this->socket($notificationRow,$data);
         }
      }
   }

   public function android($notificationRow,$data){


      if(empty($data['user']['android_device_id']) || strlen($data['user']['android_device_id'] )<20){return false;}

//      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;
      $body=$this->getTemplateText($notificationRow,$data);

      sendAndroid::send($data['user']['android_device_id'] ,$notificationRow->title,$body);
   }
   public function ios($notificationRow,$data){


      if(empty($data['user']['ios_device_id']) || strlen($data['user']['ios_device_id'])<20){return false;}

      //$view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;
      $body=$this->getTemplateText($notificationRow,$data);

      sendIos::send($data['user']['ios_device_id'],$notificationRow->title,$body);
   }
   public function email($notificationRow,$data){

      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;

      $subject=$notificationRow->title;
      $to_emal=$data['user']['email'];

      SendEmail::send($to_emal,$subject,$view,$data);
   }
    public function sms($notificationRow,$data){

        if(!(isset($data['user']['phone']) || isset($data['user']['phone']))){return false;}
        $phone=(empty($data['user']['phone']) || strlen($data['user']['phone'])<5)? $data['user']['mobile']:$data['user']['phone'];
        if(empty($phone) || strlen($phone)<5){return false;}

       $body=$this->getTemplateText($notificationRow,$data);

        sendSms::send($phone,$body);


    }

    public function socket($notificationRow,$data){

       $userNotificationData=[
            'user_id'=>$data['user']['id'],
            'title'=>$notificationRow->title,
            'body'=>$this->getTemplateText($notificationRow,$data),
            'url'=>array_key_exists('url',$data)? $data['url']:'#',
           'is_read'=>false,
        ];
        $rUserNotification =new rUserNotification();
        $rUserNotification->create($userNotificationData);
    }


    public function getTemplateText($notificationRow,$data){
        $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;

        return view($view,$data)->render();

    }

}