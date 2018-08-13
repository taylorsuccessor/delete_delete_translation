<?php


$factory->define(App\module\user_notification\model\UserNotification::class,function (Faker\Generator $faker){

    return [

            "user_id"=>$faker->numberBetween(0,50),
    "title"=>$faker->realText(15),
    "body"=>$faker->text(50),
    "url"=>$faker->realText(15),
    "is_read"=>$faker->randomElement([true,false]),

    ];
});