<?php 
namespace App\module\system_localization\database\seed;

use Illuminate\Database\Seeder;
use App\module\system_localization\model\SystemLocalization as mSystemLocalization;

class system_localization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mSystemLocalization::insert([

[


    "key"=>'',
    "en"=>'',
    "ar"=>'',

],
]);
*/


        factory(mSystemLocalization::class,30)->create();
    }
}
