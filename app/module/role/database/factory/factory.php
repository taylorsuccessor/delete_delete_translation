<?php
use App\module\role\model\Role;




$factory->define(Role::class,function (Faker\Generator $faker){


    $name =$faker->text(40);
    $slug = str_slug($name);
    return [

            "slug"=>$slug,
    "name"=>$name,
        "allow_permission"=>'*.*.*.*',
        "deny_permission"=>'',

    ];
});