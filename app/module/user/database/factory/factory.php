<?php
use App\module\user\model\User;


$factory->define(User::class,function (Faker\Generator $faker){

    return [

            "email"=>$faker->email,
    "guest_email"=>$faker->email,
    "password"=>bcrypt('123456'),
    "android_device_id"=>$faker->sha1,
    "ios_device_id"=>$faker->sha1,
    "last_login"=>$faker->dateTime,
    "first_name"=>$faker->name,
    "last_name"=>$faker->name,
    "birth_day"=>$faker->date('Y-m-d','now'),
    "avatar"=>$faker->randomDigit,
    "phone"=>$faker->phoneNumber,
    "mobile"=>$faker->phoneNumber,
    "area_id"=>$faker->randomDigit,
    "country"=>$faker->randomDigit,
    "address"=>$faker->text(50),
    "gender"=>$faker->numberBetween(0,1),
    "occupation"=>$faker->text(10),
    "type"=>$faker->numberBetween(0,10),
    "session_id"=>$faker->sha1,
    "lat"=>$faker->latitude,
    "long"=>$faker->longitude,

    ];
});