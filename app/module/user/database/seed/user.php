<?php 
namespace App\module\user\database\seed;

use Illuminate\Database\Seeder;
use App\module\user\model\User as mUser;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        mUser::insert([

            [

                "email"=>'taylorsuccessor@gmail.com',
                "guest_email"=>'taylorsuccessor@gmail.com',
                "password"=>bcrypt('123456'),//123456789
                "android_device_id"=>'',
                "ios_device_id"=>'',
                "last_login"=>'',
                "first_name"=>'taylor',
                "last_name"=>'successor',
                "birth_day"=>'',
                "avatar"=>'',
                "phone"=>'',
                "mobile"=>'',
                "area_id"=>'',
                "country"=>'',
                "address"=>'',
                "gender"=>'',
                "occupation"=>'',
                "type"=>'',
                "session_id"=>'',
                "token"=>'awYeGHcm4SK0nSWTCfOYB4F0ML3cujCtOIFaj5DMArObpQo88GTeCiyRjpEA',
                "lat"=>'',
                "long"=>'',

            ],
        ]);

        factory(mUser::class,30)->create();
    }
}
