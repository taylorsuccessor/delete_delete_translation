
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\upload_file\UploadFileServiceProvider::class,



];


/*____________________________App\Providers\EventServiceProvider
/////////even register
'App\module\upload_file\event\Create' =>[
'App\module\upload_file\listener\NotificationCreate'
],
'App\module\upload_file\event\Edit' =>[
'App\module\upload_file\listener\NotificationEdit'
],
'App\module\upload_file\event\Delete' =>[
'App\module\upload_file\listener\NotificationDelete'
],

/*__command_______________App\Console\Kernel
protected $commands = [
      'App\module\upload_file\command\CheckNew'
];

protected function schedule(Schedule $schedule)
{
     $schedule->command('upload_file:check_new')->everyMinute(1);
}

/*_____________________________templates__email_notification_sms
//____app/module/notification/config.php  add to (((notification_name)))
//notification_name

'create_upload_file'=>'Create upload_file ',
'edit_upload_file'=>' Edit upload_file',
'delete_upload_file'=>'Delete upload_file ',
'upload_file_check_new'=>'Check New upload_file ',

/*_________________________________link in layout

[
    'route' => 'admin.upload_file.index',
    'title' => 'setting',
    'icon' => 'fa  fa-shopping-cart',
    'subMenus' =>
    [
        [
        'route' => 'admin.upload_file.index',
        'title' => 'upload_file',
        'icon' => 'fa fa-gears',
        'parameter'=>'?',
        ],
    ]

],




//seed
    $this->call('App\module\upload_file\database\seed\upload_file');


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