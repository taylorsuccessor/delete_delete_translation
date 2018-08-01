<?php

namespace App\module\translate_segment_suggestion;


interface TranslateSegmentSuggestionInterface
{
    public function getSuggestionList();
    public function setSuggestionList();
    public function addSuggestionToList(TranslateSegmentSuggestionInterface $lastSuggestionList);
}