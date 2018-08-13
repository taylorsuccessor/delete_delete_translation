<?php

namespace App\module\hyperpay\admin\controller;


use App\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use GuzzleHttp\Client;

class Hyperpay
{

    private $url ;
    private $user_id ;
    private $password ;
    private $entity_id ;
    private $currency ;
    private $payment_type ;
    private $test;
    private $shopperResultUrl;
    private $notificationUrl ;

    public function __construct( )
    {

        $this->url = config('module.HYPERPAY_URL').'/checkouts';
        $this->user_id = config('module.HYPERPAY_USER_ID');
        $this->password = config('module.HYPERPAY_PASSWORD');
        $this->entity_id = config('module.HYPERPAY_ENTITY_ID');
        $this->currency = config('module.HYPERPAY_CURRENCY');
        $this->payment_type = config('module.HYPERPAY_PAYMENT_TYPE');
        $this->test = config('module.HYPERPAY_TEST');


    }

    /**
     * Display a listing of the resource.
     *
     * @return view as response
     */
    public function request($request,$amount)
    {
        $data=$this->prepearRequestData($request,$amount);


        return $this->sendRequest($data);



    }

    private function prepearRequestData($request,$amount){

        $data = [
            'authentication.userId'=>$this->user_id,
            'authentication.password'=>$this->password,
            'authentication.entityId'=>$this->entity_id,
            'amount'=> $amount,
            'currency'=>$this->currency,
            'paymentType'=>$this->payment_type,
            'merchantTransactionId'=>$request->user()->id,
            'customer.ip'=> $request->ip(),
            'customer.email'=> $request->user()->email
        ];
        if($request->has('shopperResultUrl')){
            $data['shopperResultUrl']=$request->shopperResultUrl;
        }
        if($request->has('notificationUrl')){
            $data['notificationUrl']=$request->notificationUrl;
        }




        if ($this->test){
            $data['testMode'] = 'INTERNAL';

        }
        return $data;
    }



    private function sendRequest($data){

                $client = new Client();
                $res = $client->request('POST', $this->url, [
                    'form_params' => $data
                ]);

                return json_decode( $res->getBody());

    }



    public function verify($checkout_id)
    {
        $url = $this->url . "/" . $checkout_id . "/payment";
        $data = [
            'authentication.userId'=>$this->user_id,
            'authentication.password'=>$this->password,
            'authentication.entityId'=> $this->entity_id,
        ];


        $client = new Client();
        $res = $client->request('GET', $url, [
            'form_params' => $data
        ]);

        return json_decode( $res->getBody());


    }


}
