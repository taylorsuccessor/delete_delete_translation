<?php

namespace App\module\read_file;


use App\module\read_file\FileReaderInterface;
use App\module\read_file\XmlHelper;



class Pptx implements FileReaderInterface
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }

     public function getFileText(){
        $fileXml=$this->getFileXml();
         XmlHelper::removeTagExcept($fileXml,['p:txBody']);
         XmlHelper::replaceTag($fileXml,['p:txBody'=>"\n"]);

         return $fileXml;
    }

    public function getFileXml(){

        $zip_handle = new \ZipArchive;
        $output_text = ' ';
        if(true === $zip_handle->open($this->fileUrl)){
            $slide_number = 1; //loop through slide files
            while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $output_text .= $xml_datas;
                $slide_number++;
            }

            $zip_handle->close();
        }
        return $output_text;

    }

}
