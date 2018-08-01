<?php
namespace App\module\segment_helper;



class PrepareTextToBeSegment {

    public $text;

    public function __construct($text = '')
    {
        $this->text=$text;
    }

    public function getPreparedText(){

        $this->removeDubleSpace()
            ->removeDubleNewLine();

        return $this->text;
    }

    public function removeDubleSpace(){
        $this->text=preg_replace("/\h*\R{1,}\h*/","\n",$this->text);
        $this->text=preg_replace("/\h{2,}/"," ",$this->text);
        return $this;
    }
    public function removeDubleNewLine(){

        $this->text= preg_replace('/\R{2,}/', "\n", $this->text);
        return $this;
    }



}