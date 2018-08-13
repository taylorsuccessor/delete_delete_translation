<?php
namespace App\module\hyperpay\admin\request;

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
    "user_id"=>'required',
    "amount"=>'required',
    "checkout_body"=>'required',
    "checkout_id"=>'required',
    "note"=>'required',
    "response_body"=>'required',
    "response_status"=>'required',
    "return_url"=>'required',



];
}
}
