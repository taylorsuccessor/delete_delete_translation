<?php


$factory->define(App\module\project\model\Project::class,function (Faker\Generator $faker){

    return [

            "user_id"=>$faker->randomDigit,
    "name"=>$faker->randomDigit,
    "from_language"=>$faker->randomDigit,
    "to_language"=>$faker->randomDigit,
    "status"=>$faker->randomDigit,

    ];
});