<?php 
namespace App\module\notification\database\seed;

use Illuminate\Database\Seeder;
use App\module\notification\model\Notification as mNotification;

class notification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        mNotification::insert([
            [


                'name'=>'reset_password',
                'title'=>'title reset Password',
                'type'=>'email',
                'status'=>0,
                'to_field'=>'user_email',
                'to_email'=>'',
                'language'=>'en',
                'data'=> '',
                'body'=>'my Body notification for (reset_password) with title Title reset_password
<a href="{{route(\'admin.password.reset\',[$token]) }}?email={{$user->email}}">reset password </a>'
            ],

        ]);

        factory(mNotification::class,30)->create();
    }
}
