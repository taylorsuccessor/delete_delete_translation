<?php namespace App\module\vue\admin\repository;

use Session;
use App\module\vue\model\Vue;
use App\module\vue\admin\Repository\VueContract;

class EloquentVueRepository implements VueContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Vue();


if(canAccess('admin.vue.allData')) {

}elseif(canAccess('admin.vue.groupData')){
$oResults = $oResults->where('vue.user_id','=',  \Auth::user()->id);
}elseif(canAccess('admin.vue.userData')){

}else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('vue.id', '=' , $data['id']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('vue.email', '=' , $data['email']);
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $oResults = $oResults->where('vue.password', '=' , $data['password']);
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('vue.name', '=' , $data['name']);
        }
        if (isset($data['birth_day']) && !empty($data['birth_day'])) {
            $oResults = $oResults->where('vue.birth_day', '=' , $data['birth_day']);
        }
        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('vue.phone', '=' , $data['phone']);
        }
        if (isset($data['gender']) && !empty($data['gender'])) {
            $oResults = $oResults->where('vue.gender', '=' , $data['gender']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('vue.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('vue.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('vue.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('vue.id', 'desc');
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

          $oResults = new Vue();

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

        $result = Vue::create($data);

        if ($result) {
            Session::flash('flash_message', 'vue added!');
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$vue = Vue::findOrFail($id);

        return $vue;
    }

    public function destroy($id)
    {

        $result =  Vue::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'vue deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$vue = Vue::findOrFail($id);
       $result= $vue->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'vue updated!');
            return true;
        } else {
            return false;
        }

    }

}
