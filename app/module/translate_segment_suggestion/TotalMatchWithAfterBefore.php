<?php
namespace App\module\translate_segment_suggestion;

use App\module\translate_segment_suggestion\TranslateSegmentSuggestionInterface;
use App\module\translate_segment_suggestion\TranslateSegmentSuggestionAbstract;
use App\module\translation\model\Translation as mTranslation;

class TotalMatchWithAfterBefore extends TranslateSegmentSuggestionAbstract implements TranslateSegmentSuggestionInterface
{

    public function setSuggestionList(){

$resultCollection=mTranslation::all();

        $this->suggestionList=$this->convertResultToArray($resultCollection);
    }


}