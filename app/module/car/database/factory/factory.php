<?php


$factory->define(App\module\car\model\Car::class,function (Faker\Generator $faker){

    return [

            "name"=>$faker->name,
    "email"=>$faker->email,
    "type"=>$faker->randomDigit,
    "phone"=>$faker->randomDigit,

    ];
});