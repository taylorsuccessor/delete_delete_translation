<?php

namespace App\module\notification\admin\controller\email;

class SendEmail {



   public static  function  send($to_email,$subject,$view,$data)
   {

       \Mail::send($view, $data, function($message) use($subject,$to_email)
       {

           $message->from('info@sahalat.com', 'Sahalat');


           $message->to($to_email)->subject($subject);
//            $message->cc('taylorsuccessor@gmail.com');


       });

   }


}