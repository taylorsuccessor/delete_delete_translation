<?php

namespace App\module\segment_helper\read_file;

interface FileReaderInterface{
    public function getFileText();
    public function getFileXml();
}