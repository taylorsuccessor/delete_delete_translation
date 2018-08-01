<?php
namespace  App\module\segment_helper;


class XmlHelper{



    public static function removeTagExcept(&$xmlText,$allowedTagArray=[]){
        $allowedTagText=(count($allowedTagArray))? '<'. join('><',$allowedTagArray).'>':'';

        $xmlText = strip_tags($xmlText,$allowedTagText);

    }

    public static function replaceTag(&$xmlText,$replaceArray){
        $replacedTagArray=[];
        $newTextArray=[];

        foreach($replaceArray as $tag=>$new){
            $replacedTagArray[]='/<\/?'.quotemeta($tag).'[^>]*>/i';
            $newTextArray[]=$new;
        }

        $xmlText=preg_replace($replacedTagArray,$newTextArray,$xmlText);
    }

}