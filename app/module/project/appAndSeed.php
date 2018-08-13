
//App Serivce provider


\Illuminate\Support\Facades\Schema::defaultStringLength(191);

//providers

/*
* custom module
*/

    App\module\project\ProjectServiceProvider::class,



];


/*____________________________App\Providers\EventServiceProvider
/////////even register
'App\module\project\event\Create' =>[
'App\module\project\listener\NotificationCreate'
],
'App\module\project\event\Edit' =>[
'App\module\project\listener\NotificationEdit'
],
'App\module\project\event\Delete' =>[
'App\module\project\listener\NotificationDelete'
],

/*__command_______________App\Console\Kernel
protected $commands = [
      'App\module\project\command\CheckNew'
];

protected function schedule(Schedule $schedule)
{
     $schedule->command('project:check_new')->everyMinute(1);
}

/*_____________________________templates__email_notification_sms
//____app/module/notification/config.php  add to (((notification_name)))
//notification_name

'create_project'=>'Create project ',
'edit_project'=>' Edit project',
'delete_project'=>'Delete project ',
'project_check_new'=>'Check New project ',

/*_________________________________link in layout

[
    'route' => 'admin.project.index',
    'title' => 'setting',
    'icon' => 'fa  fa-shopping-cart',
    'subMenus' =>
    [
        [
        'route' => 'admin.project.index',
        'title' => 'project',
        'icon' => 'fa fa-gears',
        'parameter'=>'?',
        ],
    ]

],


/*_______________vue routes
//resources/assets/js/app.js


import project_routes  from '@module/project/vue/route';
let router=  new VueRouter({ routes:vue_routes.concat(project_routes)});


//seed
    $this->call('App\module\project\database\seed\project');


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