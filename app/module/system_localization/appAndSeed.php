
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\system_localization\SystemLocalizationServiceProvider::class,



];


/*____________________________App\Providers\EventServiceProvider
/////////even register
'App\module\system_localization\event\Create' =>[
'App\module\system_localization\listener\NotificationCreate'
],
'App\module\system_localization\event\Edit' =>[
'App\module\system_localization\listener\NotificationEdit'
],
'App\module\system_localization\event\Delete' =>[
'App\module\system_localization\listener\NotificationDelete'
],

/*__command_______________App\Console\Kernel
protected $commands = [
      'App\module\system_localization\command\CheckNew'
];

protected function schedule(Schedule $schedule)
{
     $schedule->command('system_localization:check_new')->everyMinute(1);
}

/*_____________________________templates__email_notification_sms
//____app/module/notification/config.php  add to (((notification_name)))
//notification_name

'create_system_localization'=>'Create system_localization ',
'edit_system_localization'=>' Edit system_localization',
'delete_system_localization'=>'Delete system_localization ',
'system_localization_check_new'=>'Check New system_localization ',

/*_________________________________link in layout

[
    'route' => 'admin.system_localization.index',
    'title' => 'setting',
    'icon' => 'fa  fa-shopping-cart',
    'subMenus' =>
    [
        [
        'route' => 'admin.system_localization.index',
        'title' => 'system_localization',
        'icon' => 'fa fa-gears',
        'parameter'=>'?',
        ],
    ]

],




//seed
    $this->call('App\module\system_localization\database\seed\system_localization');


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