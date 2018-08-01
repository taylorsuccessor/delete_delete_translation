<?php

namespace App\module\segment_helper;

use App\module\segment_helper\PrepareSegment;

class GetFileSegment{
    public $filePath;
    public function __construct($filePath)
    {
        $this->filePath=$filePath;
    }

    public function getSegment(){
      $prepareSegment=new  PrepareSegment ($this->initialTextSegmentArray());
      return $prepareSegment->getPreparedSegment();
    }

    private function getInitialFileText(){




        $filePathArray = explode('.', $this->filePath);
        $extension = end($filePathArray);

        $className='\App\module\segment_helper\read_file\\'.ucfirst($extension);
        if(!class_exists($className)){dd('not');}
        $fileReader=new  $className($this->filePath);
        return $fileReader->getFileText();

    }

    private function getPreparedFileText(){
        $parse=new PrepareTextToBeSegment($this->getInitialFileText());
        return $parse->getPreparedText();
    }

    private function initialTextSegmentArray(){

        $initialSegmentArray = preg_split('/(?<=['.join('',config('segmentFile.segmentIdentifier')).'])/', $this->getPreparedFileText(), -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        return $initialSegmentArray;
    }


}