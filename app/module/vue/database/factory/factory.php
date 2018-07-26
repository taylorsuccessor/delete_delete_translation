<?php


$factory->define(App\module\vue\model\Vue::class,function (Faker\Generator $faker){

    return [

            "email"=>$faker->randomDigit,
    "password"=>$faker->randomDigit,
    "name"=>$faker->randomDigit,
    "birth_day"=>$faker->randomDigit,
    "phone"=>$faker->randomDigit,
    "gender"=>$faker->randomDigit,

    ];
});