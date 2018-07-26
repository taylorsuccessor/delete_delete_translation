<?php
namespace App\module\user\admin\request;

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
    "email"=>'required|email|unique:user',
    "guest_email"=>'',
    "password"=>'required|confirmed',
    "android_device_id"=>'',
    "ios_device_id"=>'',
    "last_login"=>'',
    "first_name"=>'',
    "last_name"=>'',
    "birth_day"=>'',
    "avatar"=>'',
    "phone"=>'',
    "mobile"=>'',
    "area_id"=>'',
    "country"=>'',
    "address"=>'',
    "gender"=>'',
    "occupation"=>'',
    "type"=>'',
    "session_id"=>'',
    "lat"=>'',
    "long"=>'',




];
}
}
