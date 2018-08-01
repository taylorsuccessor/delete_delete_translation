<?php
namespace App\module\translation\admin\request;

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
    "translate_en"=>'required',
    "translate_ar"=>'required',
    "translate_before_en"=>'required',
    "translate_after_en"=>'required',
    "translate_before_ar"=>'required',
    "translate_after_ar"=>'required',
    "user_id"=>'required',
    "status"=>'required',



];
}
}
