<?php
namespace App\module\system_localization\general\request;

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
return [
    "key"=>'required',
    "en"=>'required',
    "ar"=>'required',



];
}
}