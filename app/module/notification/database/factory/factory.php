<?php
use App\module\notification\model\Notification;



$factory->define(Notification::class,function (Faker\Generator $faker){




    $name=$faker->randomElement(['register_welcome','reset_password','success_reset_password','register_verify']);
    $title='Title '.$name;
    $body='Body notification for ('.$name.') with title '.$title;
    return [


        'name'=>$name,
        'title'=>$title,
        'type'=>$faker->randomElement(['email','sms','notification']),
        'status'=>$faker->randomElement(['email','sms','notification']),
        'to_field'=>'user_email',
        'to_email'=>'',
        'language'=>$faker->randomElement(['en','ar']),
        'data'=> '',
            'body'=>$body

    ];
});