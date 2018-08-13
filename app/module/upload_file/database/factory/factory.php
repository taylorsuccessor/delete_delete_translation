<?php


$factory->define(App\module\upload_file\model\UploadFile::class,function (Faker\Generator $faker){

    return [

            "user_id"=>$faker->randomDigit,
    "upload_group_id"=>$faker->randomDigit,
    "name"=>$faker->randomDigit,
    "original_name"=>$faker->randomDigit,
    "new_name"=>$faker->randomDigit,
    "upload_base_url"=>$faker->randomDigit,
    "detail"=>$faker->randomDigit,

    ];
});