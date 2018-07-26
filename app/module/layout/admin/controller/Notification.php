<?php
namespace App\module\layout\admin\controller;

class Notification{

    public function getNotificationList(){

        return [
            ['title'=>'taylor successor','link'=>'my link','img'=>'My Image','description'=>'my description','date'=>gmdate('Y-m-d')]
        ];
    }
}