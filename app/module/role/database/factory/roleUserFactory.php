<?php
use App\module\role\model\RoleUser;

$factory->define(RoleUser::class,function (Faker\Generator $faker){

    return [

            "user_id"=>$faker->randomDigit,
    "role_id"=>$faker->randomDigit,

    ];
});