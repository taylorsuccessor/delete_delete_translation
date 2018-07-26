<?php
namespace App\module\edit_config\admin\controller;

class Helper{


    public  function editConfig($newData){

        $configFilePath=app_path('module/edit_config/config.php');


        $originArray=require($configFilePath);

        foreach($newData as $key=>$value){
            $originArray[$key]=$value;
        }

        $newArrayAsText= $this->multiLivilArrayToString(null,$originArray);
        $newArrayAsText='<?php return '.$newArrayAsText.';';
        file_put_contents($configFilePath,$newArrayAsText);


    }
    public  function multiLivilArrayToString($arrayName,$array){
        if(!is_array($array)){return "'" . $arrayName . "'=>[]";}


        $sArray =($arrayName !==null)?  "'" . $arrayName . "'=>":'';
        $sArray.="[";
        foreach ($array as $key=>$value) {

            if(is_array($value)){
                $sArray .= $this->multiLivilArrayToString($key,$value).',';
                continue;
            }
            $sArray .= "'" . $key . "'=>'" . $value . "',";

        }
        $sArray .= ']';
        return $sArray;


    }
}
