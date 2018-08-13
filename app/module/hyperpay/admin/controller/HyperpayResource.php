<?php

namespace App\module\hyperpay\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\hyperpay\admin\request\createRequest;
use App\module\hyperpay\admin\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\hyperpay\model\Hyperpay as mHyperpay;
use App\module\hyperpay\admin\repository\HyperpayContract as rHyperpay;

    use App\module\user\admin\repository\UserContract as rUser;

use App\module\hyperpay\admin\controller\Hyperpay;
class HyperpayResource extends Controller
{
    private $rHyperpay;

    public function __construct(rHyperpay $rHyperpay)
    {
        $this->rHyperpay=$rHyperpay;
    }

    /**
    * Display a listing of the resource.
    *
    * @return view as response
    */
    public function index(Request $request)
    {
        $payment_success=false;

        if($request->has('checkout_id')){
                 $payment_success=$this->rHyperpay->checkPaymentSuccess($request->checkout_id);

        }

        $statistic=null;

        $oResults=$this->rHyperpay->getByFilter($request,$statistic);

        if(!isset($request->ajaxRequest)){
            return view('admin.hyperpay::index', compact('oResults','request','statistic','payment_success'));
        }


        $aResults=[];

        if(count($oResults)){
                foreach($oResults as $oResult){
    $aResults[$oResult->id]=[

    'id'=>  $oResult->id,

    'user_id'=>  $oResult->user_id,

    'amount'=>  $oResult->amount,

    'checkout_body'=>  $oResult->checkout_body,

    'checkout_id'=>  $oResult->checkout_id,

    'note'=>  $oResult->note,

    'response_body'=>  $oResult->response_body,

    'response_status'=>  $oResult->response_status,

    'return_url'=>  $oResult->return_url,

    'created_at'=>  $oResult->created_at,

    'updated_at'=>  $oResult->updated_at,

                        ];
        }
    }

    return new JsonResponse(['data'=>$aResults,'total'=>$oResults->total(),'statistic'=>$statistic],200,[],JSON_UNESCAPED_UNICODE);


    }

    /**
    * Show the form for creating a new resource.
    *
    * @return view
    */
    public function create(Request $request,rUser $rUser)
    {

            $userList=$rUser->getAllList();
    
        return view('admin.hyperpay::create',compact('request','userList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return redirect
    */
    public function store(createRequest $request)
    {


        $oResults=$this->rHyperpay->create($request->all());

        if(!isset($request->ajaxRequest)){
            return redirect('admin/hyperpay');
        }


        return new JsonResponse(['status'=>'success','data'=>$oResults],200,[],JSON_UNESCAPED_UNICODE);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    *
    * @return view
    */
    public function show($id,Request $request)
    {


        $hyperpay=$this->rHyperpay->show($id);

        if(isset($request->ajaxRequest)){
            return new JsonResponse(['status'=>'success','data'=>$hyperpay],200,[],JSON_UNESCAPED_UNICODE);
        }



        $request->merge(['hyperpay_id'=>$id,'page_name'=>'page']);


    
        return view('admin.hyperpay::show', compact('hyperpay','request'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    *
    * @return view
    */
    public function edit($id,rUser $rUser)
    {


        $hyperpay=$this->rHyperpay->show($id);


            $userList=$rUser->getAllList();
            return view('admin.hyperpay::edit', compact('hyperpay','userList'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    *
    * @return redirect
    */
    public function update($id, editRequest $request)
    {

        $result=$this->rHyperpay->update($id,$request);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.hyperpay.index'));
        }

        return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    *
    * @return redirect
    */
    public function destroy($id,Request $request)
    {
        $hyperpay=$this->rHyperpay->destroy($id);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.hyperpay.index'));
    }

    return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }

    public function createCheckout(Request $request){
        $hyperpay=new Hyperpay();

        $checkout_body=$hyperpay->request($request,$request->amount);

        if($checkout_body->result->code != config('module.HYPERPAY_SUCCESS_CHECKOUT_CREATE_CODE')){
            return new JsonResponse(['status'=>'error']);
        }
        $checkout_id = $checkout_body->id;

        $data=[
            'user_id'=> $request->user()->id,
            'amount'=>$request->amount,
            'return_url'=>$request->return_url,
            'note'=>$request->note,
            'checkout_body'=>json_encode($checkout_body),
            'checkout_id'=>$checkout_id,
            'note'=>$request->note,

        ];

        $oResults=$this->rHyperpay->create($data);

        return view('admin.hyperpay::payment', compact('oResults','request'));

    }

    public function hyperpayHandler(Request $request,rHyperpay $rHyperpay){

            $checkout_id=$request->id;
    $resourcePath = $request->resourcePath;

        $hyperpayRecord=mHyperpay::where('checkout_id','=',$checkout_id)->first();

    $hyperpay =new  Hyperpay();
    $response = $hyperpay->verify($checkout_id);

        $response_body=json_encode($response);
        $response_status=$response->result->code;

        $rHyperpay->update($hyperpayRecord->id,[
            'response_body'=>$response_body,
            'response_status'=>$response_status,
        ]);

    if(in_array($response_status,config('module.HYPERPAY_SUCCESS_STATUS'))){
        return redirect(env('APP_URL').$hyperpayRecord->return_url.'/?checkout_id='.$checkout_id);
    }

        return view('admin.hyperpay::payment_error');

    }


}
