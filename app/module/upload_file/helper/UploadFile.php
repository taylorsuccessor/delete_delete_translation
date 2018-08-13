<?php
namespace App\module\upload_file\helper;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
class UploadFile
{

    public $file=null;
    public $uploadFilePath=null;
    public $errorMessageList=[];
    public $new_name;

    public function __construct($inputFieldName)
    {
        $this->file= Input::file($inputFieldName);
        $this->uploadFilePath=config('module.upload_file_path');
        $this->setNewFileName();
    }

    public function validateFile(){

        if (!in_array($this->getFileType(), config('module.allowed_file_extension'))) {
            $errorMessageList[]=trans('upload_file::upload_file.fileTypeNotAllow');
        }

    }

    public function getFileType(){

        return  strtolower($this->file->getClientOriginalExtension());

    }

    public function upload()
    {
        $this->validateFile();

        if(count($this->errorMessageList) == 0){
            return $this->moveFileFromTempToServer();
        }

        return false;

    }

    public function setNewFileName(){

        $this->new_name= rand() . '_' . rand() . $this->file->getClientOriginalName();

    }


    private function moveFileFromTempToServer(){

        return $this->file->move( $this->uploadFilePath, $this->new_name);

    }



}