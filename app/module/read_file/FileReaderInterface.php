<?php

namespace App\module\read_file;

interface FileReaderInterface{
    public function getFileText();
    public function getFileXml();
}