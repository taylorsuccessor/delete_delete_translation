<?php

namespace App\module\read_file;





class Word
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }


    public function loopOverElementsToGetText($elemenets,&$fileText){

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

    }

   public function getFileXml(){

        $xml_filename = "word/document.xml"; //content file name
        $zip_handle = new \ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($this->fileUrl)){
            if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                //file_put_contents($input_file.".xml",$xml_datas);
//                $replace_newlines = preg_replace('/<w:p w[0-9-Za-z]+:[a-zA-Z0-9]+="[a-zA-z"0-9 :="]+">/',"\n\r",$xml_datas);
//                $replace_tableRows = preg_replace('/<w:tr>/',"\n\r",$replace_newlines);
//                $replace_tab = preg_replace('/<w:tab\/>/',"\t",$replace_tableRows);
//                $replace_paragraphs = preg_replace('/<\/w:p>/',"\n\r",$replace_tab);
//                $replace_other_Tags = strip_tags($replace_paragraphs);
//                $output_text = $replace_other_Tags;
                $output_text=$xml_datas;

            }else{
                $output_text .="";
            }
            $zip_handle->close();
        }else{
            $output_text .=" ";
        }

        return $output_text;
    }

    public function convertFileToHtml(){

        $phpWord = \PhpOffice\PhpWord\IOFactory::load($this->fileUrl);
        dump($phpWord);
        $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $fullXml = $htmlWriter->getWriterPart('body')->write();
        return $fullXml;
        //$htmlWriter->save(storage_path('xxx.html'));
    }

}
