<?php
namespace App\module\notification\admin\request;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
    "language"=>'required',
    "body"=>'required',



];
}
}
