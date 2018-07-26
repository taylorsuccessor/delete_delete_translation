<?php

namespace App\module\authorization\controller;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;


use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;



class PermissionController // extends Controller
{
    private $permissionsSections=[];

    private $totalSectionsNumber=0;

    public function __construct(){
        $this->setTotalSections();
        $this->setTotalSectionsNumber();
    }


    public function getTotalSections(){

        return $this->permissionsSections;
    }

    public function setTotalSections(){

        $this->permissionsSections=config('permission.permissionsSections');
    }


    public function setTotalSectionsNumber(){

        $this->totalSectionsNumber=count($this->getTotalSections());
    }


    public function getTotalSectionsNumber(){

        return  $this->totalSectionsNumber;
    }



    public function getCustomMissingSection($index){
        $section='*';
        /* todo get current request method */
        if($index==3){$section=\Request::method();
        }
        return $section;
    }

    public function getPermissionSections($permission){

        $aPermission=explode('.',$permission);

        $aPermissionSections=[];
        for($i=0;$i<$this->getTotalSectionsNumber();$i++){
            $section='*';
            if(array_key_exists($i,$aPermission)){
                $section=$aPermission[$i];

                /* todo this function take time you can delete it after adding all sections in config file */
                $this->addPermissionToConfig($i,$section);
            }else{
                $section=$this->getCustomMissingSection($i);
            }
            $aPermissionSections[]=$section;


        }
        return $aPermissionSections;

    }

    public function getUserDenyPermissions(){
        if(\Session::has('deny_permission'))
        {
            return  session('deny_permission');
        }
        else
        {
            return '|*.*.*.*.*.*';
        }


    }

    public function getUserAllowPermissions(){

        if(\Session::has('allow_permission'))
        {
            return  session('allow_permission');
        }
        else
        {
            return '';
        }

    }

    public function checkIfPermissionMatch($permission,$denyPermissions){

        $currentPermissionSections=$this->getPermissionSections($permission);
        $possibleMatchPermissions=$this->getPossibleMatchPermissions($currentPermissionSections);

        foreach($possibleMatchPermissions as $possibleMatch){

            if(preg_match('/'.preg_quote($possibleMatch, '/').'/',$denyPermissions)){
                return true;

            }

        }
        return false;
    }
    public function getPossibleMatchPermissions($sections){

        $sectionsNumber=count($sections);
        $totalOptionsNumber=pow(2,$sectionsNumber);

        $final_array=[];
        $newSections=[];
        $index=[];
        for($i = 0; $i<$sectionsNumber; $i++)
        {
            $newSections[$i]=[$sections[$i],'*'];
            $index[$i]=1;
        }

        for($i=0;$i<$totalOptionsNumber;$i++){

            for($j = 0; $j<$sectionsNumber; $j++)
            {
                $index[$j]=($i%($totalOptionsNumber/pow(2,$j+1)) ==0)? (($index[$j] ==0)? 1:0):$index[$j];
            }


            $one_final_array=[];
            for($j = 0; $j<$sectionsNumber; $j++)
            {
                $one_final_array[]=$newSections[$j][$index[$j]];
            }



            $one_final_text=join('.', $one_final_array);
            $final_array[$one_final_text] =$one_final_text ;

        }



        return $final_array;

    }


    public function addPermissionToConfig($index,$permission){
        /* todo this function take time you can delete it after adding all sections in config file */
        if(in_array($permission,$this->getTotalSections()[$index])){
            return true;
        }
        $newPermissionFile=config('permission');
        $newPermissionFile['permissionsSections'][$index][]=$permission;

        file_put_contents(base_path("app/module/authorization/config/permission.php")  , $this->arrayToString($newPermissionFile));

    }


    public function arrayToString($array,$sub='')
    {
        if(!is_array($array)){return "<?php  return []; ?>";}

        $sArray =($sub=='')? "<?php return [\n":"[\n";

        foreach ($array as $key => $value) {

            $sArray.="'" . $key . "'=>" ;
            if(is_array($value)){
                $sArray.= $this->arrayToString($value,1);
            }else{
                $sArray .= "'".$value . "',\n";
            }
        }
        $sArray .= ($sub=='')? ']; ?>':"],\n";
        return $sArray;
    }



    public function deny($permission){
        return  $this->checkIfPermissionMatch($permission,$this->getUserDenyPermissions());
    }

    public function allow($permission){

        return  $this->checkIfPermissionMatch($permission,$this->getUserAllowPermissions());
    }

    public function access($permission){

        // return (($this->deny($permission))? false:true);
        return($this->allow($permission))? (($this->deny($permission))? false:true):false;
    }



}

