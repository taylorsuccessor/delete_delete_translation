<?php namespace App\module\car\admin\repository;

use Session;
use App\module\car\model\Car;
use App\module\car\admin\Repository\CarContract;



use App\module\car\event\Create as eCreate;
use App\module\car\event\Edit as eEdit;
use App\module\car\event\Delete as eDelete;

class EloquentCarRepository implements CarContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Car();


        if(canAccess('admin.car.allData')) {

        }elseif(canAccess('admin.car.groupData')){
            $oResults = $oResults->where('car.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.car.userData')){

        }else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('car.id', '=' , $data['id']);
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('car.name', '=' , $data['name']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('car.email', '=' , $data['email']);
        }
        if (isset($data['type']) && !empty($data['type'])) {
            $oResults = $oResults->where('car.type', '=' , $data['type']);
        }
        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('car.phone', '=' , $data['phone']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('car.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('car.updated_at', '=' , $data['updated_at']);
        }


        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('car.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('car.id', 'desc');
        }


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
            $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
            $oResults = $oResults->paginate(config('laravel55.pagination_size'), ['*'], $data['page_name']);
        }else{
            $oResults = $oResults->paginate(config('laravel55.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

        $oResults = new Car();

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

        $result = Car::create($data);

        if ($result) {
            Session::flash('flash_message', 'car added!');
            event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $car = Car::findOrFail($id);

        return $car;
    }

    public function destroy($id)
    {
        $old=Car::find($id)->toJson();
        $result = Car::destroy($id);


        if ($result) {
            Session::flash('flash_message', 'car deleted!');
            event(new eDelete($old));
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
        $model = Car::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'car updated!');
            event(new eEdit($oldModel,$model));
            return $result;
        } else {
            return false;
        }

    }

}
