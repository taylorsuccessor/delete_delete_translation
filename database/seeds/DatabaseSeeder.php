<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

//        $this->call('App\module\car\database\seed\car');
//
//
//        $this->call('App\module\role\database\seed\role');
//        $this->call('App\module\role\database\seed\roleUser');
//
//
//        $this->call('App\module\user\database\seed\user');
//        $this->call('App\module\notification\database\seed\notification');


$this->getModuleSeedFile();
    }



    public function getModuleSeedFile(){

        $allModulePath=app_path('module');
        $moduleList=scandir($allModulePath);
        if(is_array($moduleList)){
            foreach($moduleList as $oneModule){
                $oneModuleSeedPath=$allModulePath.'\\'.$oneModule.'\\database\\seed';
                if(!is_dir($oneModuleSeedPath) || $oneModule =='.' ||$oneModule=='..'){continue;}
                $fileList=scandir($oneModuleSeedPath);

                if(is_array($fileList)){
                    foreach($fileList as $oneFile){
                        if(!\Illuminate\Support\Str::endsWith($oneFile,'.php')){continue;}
                        $oneFilePath='\\App\\module\\'.$oneModule.'\\database\\seed\\'.rtrim($oneFile,'.php');
                        $this->call($oneFilePath);
                    }
                }


            }
        }
    }
}
