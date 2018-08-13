<?php
namespace App\module\project\api\request;

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
    "user_id"=>'required',
    "name"=>'required',
    "from_language"=>'required',
    "to_language"=>'required',
    "status"=>'required',



];
}
}
