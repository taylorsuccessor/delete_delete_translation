<?php

namespace App\module\translate_segment_suggestion;


use App\module\translate_segment_suggestion\TranslateSegmentSuggestionInterface;

abstract class TranslateSegmentSuggestionAbstract
{

    public $suggestionList=[];
    public $textToTranslate=null;


    public function getSuggestionList(){

        return $this->suggestionList;

    }

    public function __construct($textToTranslate= null,TranslateSegmentSuggestionAbstract $lastSuggestion = null)
    {
        if($textToTranslate != null && is_string($textToTranslate)){
            $this->textToTranslate=$textToTranslate;
        }elseif($lastSuggestion != null){
            $this->textToTranslate=$lastSuggestion->textToTranslate;
            $this->addSuggestionToList($lastSuggestion);
        }

        if($this->textToTranslate!==null){
            $this->setSuggestionList();
        }
    }

    public function addSuggestionToList(TranslateSegmentSuggestionInterface $lastSuggestion){

        $this->suggestionList = $this->suggestionList +$lastSuggestion->getSuggestionList();

        return $this;
    }

    public function convertResultToArray($resultCollection){


        $resultArray=[];
        foreach($resultCollection as $result){
            $resultArray[$result->id]=[
                "translate_en"=>$result->translate_en,
                "translate_ar"=>$result->translate_ar,
                "translate_before_en"=>$result->translate_before_en,
                "translate_after_en"=>$result->translate_after_en,
                "translate_before_ar"=>$result->translate_before_ar,
                "translate_after_ar"=>$result->translate_after_ar,
                "user_id"=>$result->user_id,
                "status"=>$result->status,
            ];
        }
        return $resultArray;
    }

    abstract public function setSuggestionList();
}