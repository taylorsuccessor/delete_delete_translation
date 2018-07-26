<?php


$factory->define(App\module\authentication\model\Authentication::class,function (Faker\Generator $faker){

    return [

            "email"=>$faker->randomDigit,
    "password"=>$faker->randomDigit,

    ];
});