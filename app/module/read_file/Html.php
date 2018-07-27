<?php

namespace App\module\read_file;



use App\module\read_file\FileReaderInterface;

class Html implements FileReaderInterface
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }





    public function getFileText(){
        $fileText=$this->getFileXml();
        XmlHelper::replaceTag($fileText,["p"=>"\n"]);
        XmlHelper::removeTagExcept($fileText);

        return $fileText;
    }

    public function getFileXml(){

        return file_get_contents($this->fileUrl);
    }

}
