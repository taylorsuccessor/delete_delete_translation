<?php

namespace App\module\system_localization\admin\controller;

class CreateVueJsTranslation{

    private $lang='en';

    public function __construct($lang='en')
    {
        $this->lang=$lang;

    }

//    public function createVueTranslationJs(){
//        $view='admin.system_localization::vue_translation_js';
//
//        $data=['translationList'=>$this->getTranslationList()];
//        file_put_contents(public_path('js/vue_translation/'.$this->lang.'.js'),view($view,$data)->render());
//
//    }


    private function getModuleLangPathList(){
        $modulePathList=[];
        $allModulePath=app_path('module');
        $moduleList=$this->scanIfExist($allModulePath);

        foreach($moduleList as $oneModule){
            $oneModuleLangPath=$allModulePath.'/'.$oneModule.'/lang/'.$this->lang;
            if(!is_dir($oneModuleLangPath) || $oneModule =='.' ||$oneModule=='..'){continue;}
            $modulePathList[]=$oneModuleLangPath;
        }


        return $modulePathList;
    }

    private function getAllFileArray($folderToScan){

        $allFileArray=[];
        $fileList=$this->scanIfExist($folderToScan);


        foreach($fileList as $oneFile){

            if($oneFile =='.'|| $oneFile =='..'){continue;}

            $fileContent= include($folderToScan.'/'.$oneFile);
            if(!is_array($fileContent)){continue;}
            $allFileArray+=$fileContent;
        }

        return $allFileArray;
    }

    public function getTranslationList(){
        $finalLangList=[];
        $moduleLangPathList=$this->getModuleLangPathList();
        $moduleLangPathList[]=base_path('resources/lang/'.$this->lang);

        foreach($moduleLangPathList as $oneFolder){
            $finalLangList+=$this->getAllFileArray($oneFolder);
        }



        return $finalLangList;
    }

    private function scanIfExist($dir){
        return is_dir($dir)? scandir($dir):[];
    }

}