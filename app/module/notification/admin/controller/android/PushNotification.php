<?php

namespace App\module\notification\admin\controller\android;

class PushNotification {



   public static  function  send( $registrationIds ,$title,$body){
        $msg = array
        (

            'body'  => $body,
            'title' => $title,
            'icon' => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );
        $fields = array
        (
            'to'  => $registrationIds,
            'notification' => $msg
        );


        $headers = array
        (
            'Authorization: key=' . config('module.android_API_ACCESS_KEY'),
            'Content-Type: application/json'
        );
#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, config('module.android_firebaseUrl') );
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
#Echo Result Of FireBase Server
        return true;


    }


    /*
     * after sending notification the result maybe text or json object check if it's success or fail
     */
    public function parseResult($result){

        return true;
    }
//
//$body="body";
//$title="title";
//
//$message_status=send('eeHNDWpWLCs:APA91bHhBZdGuJ6CZaGnnqWpg_fO8O7l7UgaIij-p8W82V93AShgq8mGgTK_rNOAKwnvId0LiLE1YGmVhF3Yj4-larlg5cNR0eESLpNGswXvhMxPdNuUUyMAk-Rus48o3izVtfeYg2Bq',$body,$title);




}