<?php 
namespace App\module\hyperpay\database\seed;

use Illuminate\Database\Seeder;
use App\module\hyperpay\model\Hyperpay as mHyperpay;

class hyperpay extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mHyperpay::insert([

[


    "user_id"=>'',
    "amount"=>'',
    "checkout_body"=>'',
    "checkout_id"=>'',
    "note"=>'',
    "response_body"=>'',
    "response_status"=>'',
    "return_url"=>'',

],
]);
*/


        factory(mHyperpay::class,30)->create();
    }
}
