<?php

namespace App\module\notification\admin\controller\ios;

class PushNotification {



    public static  function send($devecd_id,$message,$title){


        $ctx = stream_context_create();

        stream_context_set_option($ctx, 'ssl', 'local_cert', app_path().'/module/notification/admin/controller/ios/cofe-distri.pem');




        stream_context_set_option($ctx, 'ssl', 'passphrase', 1234);
//$message='2dad390b1e231370feb8e9d906cb92ff1217a488450e6be96c14f85f57279865';


        // Create the payload body
        $body['aps'] = array(
            'alert' => array('title'=>$title,'body' => $message, 'Test' => 'Show'),
            'sound' => 'default'
        );

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Open a connection to the APNS server
        $apns = stream_socket_client(
            'ssl://gateway.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$apns)
        {
            return false;
        }

        // echo 'Connected to APNS' . PHP_EOL;

        $imsg = chr(0) . pack('n', 32) . pack('H*', $devecd_id) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $res = fwrite($apns, $imsg, strlen($imsg));

        if (!$res)
        {
        }
        fclose($apns);
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