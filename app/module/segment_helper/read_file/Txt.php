<?php

namespace App\module\segment_helper\read_file;

use App\module\segment_helper\read_file\FileReaderInterface;



class Txt implements FileReaderInterface
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }



    public function getFileText(){

        return file_get_contents($this->fileUrl);
    }
    public function getFileXml(){

    return '<txt>'.$this->getFileText().'</txt>';

    }

}
