<?php

namespace App\module\notification\admin\controller;

use App\module\notification\admin\controller\sms\SendSms;
use App\module\notification\admin\controller\email\SendEmail;
use App\module\notification\admin\controller\ios\PushNotification as sendIos;
use App\module\notification\admin\controller\android\PushNotification as sendAndroid;


use App\module\notification\model\Notification as mNotification;
use App\module\notification\admin\repository\EloquentNotificationRepository as rNotification;

class SendNotification {


   public function sayFoo($test){
      dd('Foo from SendNotification class'.$test);
   }

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
         }
      }
   }

   public function android($notificationRow,$data){


      if(empty($data['user']['android_device_id']) || strlen($data['user']['android_device_id'] )<20){return false;}

      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;
      $body=view($view,$data)->render();

      sendAndroid::send($data['user']['android_device_id'] ,$notificationRow->title,$body);
   }
   public function ios($notificationRow,$data){


      if(empty($data['user']['ios_device_id']) || strlen($data['user']['ios_device_id'])<20){return false;}

      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;
      $body=view($view,$data)->render();

      sendIos::send($data['user']['ios_device_id'],$notificationRow->title,$body);
   }
   public function email($notificationRow,$data){

      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;

      $subject=$notificationRow->title;
      $to_emal=$data['user']['email'];

      SendEmail::send($to_emal,$subject,$view,$data);
   }
   public function sms($notificationRow,$data){

      $phone=(empty($data['user']['phone']) || strlen($data['user']['phone'])<5)? $data['user']['mobile']:$data['user']['phone'];
      if(empty($phone) || strlen($phone)<5){return false;}

      $view='admin.notification::template.'.$notificationRow->language.'.'.$notificationRow->type.'_'.$notificationRow->name;
      $body=view($view,$data)->render();

      sendSms::send($phone,$body);


   }


}