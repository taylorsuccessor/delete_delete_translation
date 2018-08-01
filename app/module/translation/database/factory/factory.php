<?php


$factory->define(App\module\translation\model\Translation::class,function (Faker\Generator $faker){

    return [

            "translate_en"=>$faker->randomDigit,
    "translate_ar"=>$faker->randomDigit,
    "translate_before_en"=>$faker->randomDigit,
    "translate_after_en"=>$faker->randomDigit,
    "translate_before_ar"=>$faker->randomDigit,
    "translate_after_ar"=>$faker->randomDigit,
    "user_id"=>$faker->randomDigit,
    "status"=>$faker->randomDigit,

    ];
});