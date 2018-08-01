<?php
namespace App\module\translate_segment_suggestion;

use App\module\translate_segment_suggestion\TranslateSegmentSuggestionInterface;
use App\module\translate_segment_suggestion\TranslateSegmentSuggestionAbstract;
use GoogleTranslate\Client;

class GoogleTranslate extends TranslateSegmentSuggestionAbstract implements TranslateSegmentSuggestionInterface
{

    public function setSuggestionList(){
        $client = new Client('GOOGLE ACCESS KEY HERE');

        $googleResult= $client->translate('this is a test', 'ar');

        $this->suggestionList=["sdfsd"=>$googleResult];
    }


}