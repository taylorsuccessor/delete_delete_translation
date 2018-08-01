<?php

namespace App\module\segment_helper\read_file;

use App\module\segment_helper\read_file\FileReaderInterface;



class Xlsx implements FileReaderInterface
{
    public $fileUrl;

    public function __construct($fileUrl = null)
    {
        $this->fileUrl=storage_path( $fileUrl);
    }



    public function getFileText(){

        $content = "";
        $dir = 'tempforxlsx';
        // Unzip
        $zip = new \ZipArchive();
        $zip->open($this->fileUrl);
        $zip->extractTo($dir);
        // Open up shared strings & the first worksheet
        $strings = simplexml_load_file($dir . '/xl/sharedStrings.xml');
        $sheet   = simplexml_load_file($dir . '/xl/worksheets/sheet1.xml');
        // Parse the rows
        $xlrows = $sheet->sheetData->row;
        foreach ($xlrows as $xlrow) {
            $arr = array();

            // In each row, grab it's value
            foreach ($xlrow->c as $cell) {
                $v = (string) $cell->v;

                // If it has a "t" (type?) of "s" (string?), use the value to look up string value
                if (isset($cell['t']) && $cell['t'] == 's') {
                    $s  = array();
                    $si = $strings->si[(int) $v];

                    // Register & alias the default namespace or you'll get empty results in the xpath query
                    $si->registerXPathNamespace('n', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
                    // Cat together all of the 't' (text?) node values
                    foreach($si->xpath('.//n:t') as $t) {
                        $content .= $t."\n";}   }
            }
        }
        return $content;
    }
    public function getFileXml(){

    return '<xlsx>'.$this->getFileText().'</xlsx>';

    }

}
