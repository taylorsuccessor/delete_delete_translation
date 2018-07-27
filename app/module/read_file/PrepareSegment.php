<?php
namespace App\module\read_file;



class PrepareSegment {

    public $segmentArray;

    public function __construct($segmentArray = [])
    {
        $this->segmentArray=$segmentArray;
    }

    public function getPreparedSegment(){

        $this->removeEmptySegment();

        return $this->segmentArray;
    }

    public function removeEmptySegment(){

        $dleteSegment=config('segmentFile.deleteSegment');
        foreach($this->segmentArray as $key=>$segment){
            if(preg_match('/'.join('|',$dleteSegment).'/',$segment)){
                unset(  $this->segmentArray[$key]) ;
            }
        }



        $this->segmentArray=$this->segmentArray;
        return $this;
    }




}