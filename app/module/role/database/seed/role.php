<?php
namespace App\module\role\database\seed;

use Illuminate\Database\Seeder;
use App\module\role\model\Role as mRole;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mRole::insert([
            [
                "slug"=>'admin',
                "name"=>'admin',
                "allow_permission"=>'*.*.*.*',
                "deny_permission"=>'',
            ]

        ]);

        factory(mRole::class,30)->create();
    }
}
