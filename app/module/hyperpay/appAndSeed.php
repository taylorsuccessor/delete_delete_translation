
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\hyperpay\HyperpayServiceProvider::class,



];


/*____________________________App\Providers\EventServiceProvider
/////////even register
'App\module\hyperpay\event\Create' =>[
'App\module\hyperpay\listener\NotificationCreate'
],
'App\module\hyperpay\event\Edit' =>[
'App\module\hyperpay\listener\NotificationEdit'
],
'App\module\hyperpay\event\Delete' =>[
'App\module\hyperpay\listener\NotificationDelete'
],

/*__command_______________App\Console\Kernel
protected $commands = [
      'App\module\hyperpay\command\CheckNew'
];

protected function schedule(Schedule $schedule)
{
     $schedule->command('hyperpay:check_new')->everyMinute(1);
}

/*_____________________________templates__email_notification_sms
//____app/module/notification/config.php  add to (((notification_name)))
//notification_name

'create_hyperpay',
'edit_hyperpay',
'delete_hyperpay',
'hyperpay_check_new',

/*_________________________________link in layout

[
    'route' => 'admin.hyperpay.index',
    'title' => 'setting',
    'icon' => 'fa  fa-shopping-cart',
    'subMenus' =>
    [
        [
        'route' => 'admin.hyperpay.index',
        'title' => 'hyperpay',
        'icon' => 'fa fa-gears',
        'parameter'=>'?',
        ],
    ]

],




//seed
    $this->call('App\module\hyperpay\database\seed\hyperpay');


];



//to load all seeders to DatabaseSeeder.php

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






//test browser add it to some test


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