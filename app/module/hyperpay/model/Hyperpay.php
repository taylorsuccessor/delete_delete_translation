<?php namespace App\module\hyperpay\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hyperpay extends Model
{

    use SoftDeletes;

    protected $fillable = [
       "id","user_id","amount","checkout_body","checkout_id","note","response_body","response_status","return_url","created_at","updated_at"    ];
    protected $table='hyperpay';

    public $timestamps =true ;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\module\user\model\User');
    }

    public function user_email()
    {
        return (isset($this->user->id)) ? $this->user->email : '';
    }

    public function response_status(){
        if(in_array($this->response_status,config('module.HYPERPAY_SUCCESS_STATUS'))){
            return trans('hyperpay::hyperpay.successPayment');
        }
        return trans('hyperpay::hyperpay.notCompletePayment');
    }


}
