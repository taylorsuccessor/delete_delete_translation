<?php 
namespace App\module\role\database\seed;

use Illuminate\Database\Seeder;
use App\module\role\model\RoleUser as mRoleUser;


class roleUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        mRoleUser::insert([
            [
                "user_id"=>1,
                "role_id"=>1,
            ]

        ]);


        factory(mRoleUser::class,30)->create();
    }
}
