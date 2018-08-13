<?php


$factory->define(App\module\system_localization\model\SystemLocalization::class,function (Faker\Generator $faker){

    return [

            "key"=>$faker->randomDigit,
    "en"=>$faker->randomDigit,
    "ar"=>$faker->randomDigit,

    ];
});