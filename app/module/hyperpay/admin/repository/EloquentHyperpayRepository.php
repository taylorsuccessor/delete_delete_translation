<?php namespace App\module\hyperpay\admin\repository;

use Session;
use App\module\hyperpay\model\Hyperpay;
use App\module\hyperpay\admin\Repository\HyperpayContract;




use App\module\hyperpay\event\Create as eCreate;
use App\module\hyperpay\event\Edit as eEdit;
use App\module\hyperpay\event\Delete as eDelete;

class EloquentHyperpayRepository implements HyperpayContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Hyperpay();


        if(canAccess('admin.hyperpay.allData')) {

        }elseif(canAccess('admin.hyperpay.groupData')){
            $oResults = $oResults->where('hyperpay.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.hyperpay.userData')){

        }else{return [];}

                if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('hyperpay.id', '=' , $data['id']);
        }
                if (isset($data['user_id']) && !empty($data['user_id'])) {
            $oResults = $oResults->where('hyperpay.user_id', '=' , $data['user_id']);
        }
                if (isset($data['amount']) && !empty($data['amount'])) {
            $oResults = $oResults->where('hyperpay.amount', '=' , $data['amount']);
        }
                if (isset($data['checkout_body']) && !empty($data['checkout_body'])) {
            $oResults = $oResults->where('hyperpay.checkout_body', '=' , $data['checkout_body']);
        }
                if (isset($data['checkout_id']) && !empty($data['checkout_id'])) {
            $oResults = $oResults->where('hyperpay.checkout_id', '=' , $data['checkout_id']);
        }
                if (isset($data['note']) && !empty($data['note'])) {
            $oResults = $oResults->where('hyperpay.note', '=' , $data['note']);
        }
                if (isset($data['response_body']) && !empty($data['response_body'])) {
            $oResults = $oResults->where('hyperpay.response_body', '=' , $data['response_body']);
        }
                if (isset($data['response_status']) && !empty($data['response_status'])) {
            $oResults = $oResults->where('hyperpay.response_status', '=' , $data['response_status']);
        }
                if (isset($data['return_url']) && !empty($data['return_url'])) {
            $oResults = $oResults->where('hyperpay.return_url', '=' , $data['return_url']);
        }
                if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('hyperpay.created_at', '=' , $data['created_at']);
        }
                if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('hyperpay.updated_at', '=' , $data['updated_at']);
        }
        

        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('hyperpay.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('hyperpay.id', 'desc');
        }


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
             $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
             $oResults = $oResults->paginate(config('translation.pagination_size'), ['*'], $data['page_name']);
        }else{
             $oResults = $oResults->paginate(config('translation.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

        $oResults = new Hyperpay();

        $oResults = $oResults->get();

        $aResults=[];

        foreach($oResults as $result){
            $aResults[$result->id]=$result->name;
        }
          return $aResults;
    }


    public function getStatistic($oResults)
    {
        $oTotalResults=clone $oResults;

        $current_month = gmdate('Y-m');

        $totalResults=$oTotalResults->count();
        return ['total'=>$totalResults];
    }


    public function create($data)
    {

        $result = Hyperpay::create($data);

        if ($result) {
            Session::flash('flash_message', 'hyperpay added!');
           // event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $hyperpay = Hyperpay::findOrFail($id);

        return $hyperpay;
    }

    public function destroy($id)
    {

        $old=Hyperpay::find($id)->toJson();
        $result =  Hyperpay::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'hyperpay deleted!');
          //  event(new eDelete($old));
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $model = Hyperpay::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());

        if ($result) {
            Session::flash('flash_message', 'hyperpay updated!');

            if(in_array($model->response_status,config('module.HYPERPAY_SUCCESS_STATUS'))
                && !in_array($oldModel['response_status'],config('module.HYPERPAY_SUCCESS_STATUS'))) {

                event(new eEdit($oldModel, $model));
            }
            return true;
        } else {
            return false;
        }

    }

    public function checkPaymentSuccess($checkout_id){
        $hyperpayRecord=Hyperpay::where('checkout_id','=',$checkout_id)->first();
        if(in_array($hyperpayRecord->response_status,config('module.HYPERPAY_SUCCESS_STATUS'))){
            return true;
        }
        return false;

    }

}
