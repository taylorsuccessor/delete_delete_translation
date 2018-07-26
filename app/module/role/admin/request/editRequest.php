<?php
namespace App\module\role\admin\request;

use Illuminate\Foundation\Http\FormRequest;

class editRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*
* @return bool
*/
public function authorize()
{
return true;
}

/**
* Get the validation rules that apply to the request.
*
* @return array
*/
public function rules()
{
    $aPermissions = $this->permissionOneText;
    $aPermissions=(is_array($aPermissions))? $aPermissions:[$aPermissions];

    $permissions='';
    foreach($aPermissions as $permission){
        $permissions.='|'.$permission;
    }


    $aDenyPermissions = $this->denyPermissionOneText;
    $aDenyPermissions=(is_array($aDenyPermissions))? $aDenyPermissions:[$aDenyPermissions];

    $denyPermissions='';
    foreach($aDenyPermissions as $permission){
        $denyPermissions.='|'.$permission;
    }


    $slug=strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''), $this->name));

    $this->merge(['slug'=>$slug,'allow_permission'=>$permissions,'deny_permission'=>$denyPermissions]);
    return [

        "name"=>'required',
    ];
}
}
