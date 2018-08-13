<?php


$factory->define(App\module\hyperpay\model\Hyperpay::class,function (Faker\Generator $faker){

    return [

            "user_id"=>$faker->numberBetween(1,40),
    "amount"=>$faker->randomDigit,
    "checkout_body"=>$faker->randomDigit,
    "checkout_id"=>$faker->randomDigit,
    "note"=>$faker->realText(30),
    "response_body"=>$faker->randomDigit,
    "response_status"=>$faker->randomElement(['000.100.112','','000.100.116']),
    "return_url"=>$faker->randomElement(['/admin/hyperpay','/admin/user']),

    ];
});