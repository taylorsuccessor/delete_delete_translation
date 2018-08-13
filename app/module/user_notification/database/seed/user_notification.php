<?php 
namespace App\module\user_notification\database\seed;

use Illuminate\Database\Seeder;
use App\module\user_notification\model\UserNotification as mUserNotification;

class user_notification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mUserNotification::insert([

[


    "user_id"=>'',
    "title"=>'',
    "body"=>'',
    "url"=>'',
    "is_read"=>'',

],
]);
*/


        factory(mUserNotification::class,30)->create();
    }
}
