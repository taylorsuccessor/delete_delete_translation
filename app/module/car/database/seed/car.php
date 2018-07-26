<?php 
namespace App\module\car\database\seed;

use Illuminate\Database\Seeder;
use App\module\car\model\Car as mCar;

class car extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mCar::insert([

[


    "name"=>'',
    "email"=>'',
    "type"=>'',
    "phone"=>'',

],
]);
*/


        factory(mCar::class,30)->create();
    }
}
