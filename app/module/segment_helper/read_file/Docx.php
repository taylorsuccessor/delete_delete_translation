<?php

namespace App\module\segment_helper\read_file;


use App\module\segment_helper\XmlHelper;

use App\module\segment_helper\read_file\FileReaderInterface;

class Docx implements FileReaderInterface
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }


    private function loopOverElementsToGetText($elemenets,&$fileText){

        foreach ($elemenets as $elemenet){

            if(method_exists($elemenet,'getElements')){

                $this->loopOverElementsToGetText($elemenet->getElements(),$fileText);

            }elseif(method_exists($elemenet,'getRows')){

                $this->loopOverElementsToGetText($elemenet->getRows(),$fileText);

            }elseif(method_exists($elemenet,'getCells')){

                $this->loopOverElementsToGetText($elemenet->getCells(),$fileText);

            }elseif(method_exists($elemenet,'getText')){
                $fileText.=$elemenet->getText();

            }
        }
    }

    public function getFileElementsText(){


        $phpWord = \PhpOffice\PhpWord\IOFactory::load($this->fileUrl);
        $sections = $phpWord->getSections();
        $fileText="";
        $this->loopOverElementsToGetText($sections,$fileText);
        return $fileText;
    }

    public function getFileText(){
        $fileText=$this->getFileXml();
        XmlHelper::replaceTag($fileText,["p"=>"\n"]);
        XmlHelper::removeTagExcept($fileText);

        return $fileText;
    }

   public function delete_getFileXml(){

        $xml_filename = "word/document.xml"; //content file name
        $zip_handle = new \ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($this->fileUrl)){
            if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);

                $output_text=$xml_datas;

            }
            $zip_handle->close();
        }

        return $output_text;
    }

    public function getFileXml(){

        $phpWord = \PhpOffice\PhpWord\IOFactory::load($this->fileUrl);

        $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $fullXml = $htmlWriter->getWriterPart('body')->write();
        return $fullXml;
        //$htmlWriter->save(storage_path('xxx.html'));
    }

    public function old_getFileXml(){
        $zip = new \ZipArchive;
        $text='';
        $zip->open($this->fileUrl);
        if (($index = $zip->locateName("word/document.xml")) !== false) {
            $text = $zip->getFromIndex($index);

        }
        $zip->close();
        return  $text;
    }
}
