<?php 
namespace App\module\vue\database\seed;

use Illuminate\Database\Seeder;
use App\module\vue\model\Vue as mVue;

class vue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mVue::insert([

[


    "email"=>'',
    "password"=>'',
    "name"=>'',
    "birth_day"=>'',
    "phone"=>'',
    "gender"=>'',

],
]);
*/


        factory(mVue::class,30)->create();
    }
}
