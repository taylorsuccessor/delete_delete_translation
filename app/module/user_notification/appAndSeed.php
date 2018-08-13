
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\user_notification\UserNotificationServiceProvider::class,



];


/*____________________________App\Providers\EventServiceProvider
/////////even register
'App\module\user_notification\event\Create' =>[
'App\module\user_notification\listener\NotificationCreate'
],
'App\module\user_notification\event\Edit' =>[
'App\module\user_notification\listener\NotificationEdit'
],
'App\module\user_notification\event\Delete' =>[
'App\module\user_notification\listener\NotificationDelete'
],

/*__command_______________App\Console\Kernel
protected $commands = [
      'App\module\user_notification\command\CheckNew'
];

protected function schedule(Schedule $schedule)
{
     $schedule->command('user_notification:check_new')->everyMinute(1);
}

/*_____________________________templates__email_notification_sms
//____app/module/notification/config.php  add to (((notification_name)))
//notification_name

'create_user_notification',
'edit_user_notification',
'delete_user_notification',
'user_notification_check_new',

/*_________________________________link in layout

[
    'route' => 'admin.user_notification.index',
    'title' => 'setting',
    'icon' => 'fa  fa-shopping-cart',
    'subMenus' =>
    [
        [
        'route' => 'admin.user_notification.index',
        'title' => 'user_notification',
        'icon' => 'fa fa-gears',
        'parameter'=>'?',
        ],
    ]

],




//seed
    $this->call('App\module\user_notification\database\seed\user_notification');


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