<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Support\Facades\Artisan;


class ExampleTest extends DuskTestCase
{
//use DatabaseMigrations;
//    public  function __construct(){
//
//
//
//
//    }
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {


//        $this->artisan('migrate');
//        $this->artisan('db:seed');

        $this->browse(function (Browser $browser) {

$this->getModuleTestDuskPage($browser);

        });
    }



public function getModuleTestDuskPage($browser){

    $allModulePath=app_path('module');
    $moduleList=scandir($allModulePath);
    if(is_array($moduleList)){
        foreach($moduleList as $oneModule){
            $oneModuleDuskPagePath=$allModulePath.'\\'.$oneModule.'\\test\\dusk\\page';
            if(!is_dir($oneModuleDuskPagePath) || $oneModule =='.' ||$oneModule=='..'){continue;}
            $pageList=scandir($oneModuleDuskPagePath);

            if(is_array($pageList)){
                foreach($pageList as $onePage){
                    if(!\Illuminate\Support\Str::endsWith($onePage,'.php')){continue;}
                    $onePage='\\App\\module\\'.$oneModule.'\\test\\dusk\\page\\'.rtrim($onePage,'.php');
                    $browser->visit(new $onePage());
                }
            }


        }
    }
}
}
