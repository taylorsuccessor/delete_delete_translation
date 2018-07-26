<?php
namespace App\module\notification\website\request;

use App\Http\Requests\Request;

class editRequest extends Request
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
    "name"=>'required',
    "title"=>'required',
    "type"=>'required',
    "status"=>'required',
    "to_field"=>'required',
    "to_email"=>'required',
    "language"=>'required',
    "data"=>'required',
    "body"=>'required',



];
}
}
