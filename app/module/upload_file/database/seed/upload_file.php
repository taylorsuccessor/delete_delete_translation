<?php 
namespace App\module\upload_file\database\seed;

use Illuminate\Database\Seeder;
use App\module\upload_file\model\UploadFile as mUploadFile;

class upload_file extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
mUploadFile::insert([

[


    "user_id"=>'',
    "upload_group_id"=>'',
    "name"=>'',
    "original_name"=>'',
    "new_name"=>'',
    "upload_base_url"=>'',
    "detail"=>'',

],
]);
*/


        factory(mUploadFile::class,30)->create();
    }
}
