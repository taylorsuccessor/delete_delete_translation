<?php 
namespace App\module\project\database\seed;

use Illuminate\Database\Seeder;
use App\module\project\model\Project as mProject;

class project extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mProject::insert([

[


    "user_id"=>'',
    "name"=>'',
    "from_language"=>'',
    "to_language"=>'',
    "status"=>'',

],
]);
*/


        factory(mProject::class,30)->create();
    }
}
