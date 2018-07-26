<?php namespace App\module\authentication\admin\repository;

use Session;
use App\module\authentication\model\Authentication;
use App\module\authentication\admin\Repository\AuthenticationContract;

class EloquentAuthenticationRepository implements AuthenticationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Authentication();


if(canAccess('admin.authentication.allData')) {

}elseif(canAccess('admin.authentication.groupData')){
$oResults = $oResults->where('authentication.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.authentication.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('authentication.id', '=' , $data['id']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('authentication.email', '=' , $data['email']);
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $oResults = $oResults->where('authentication.password', '=' , $data['password']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('authentication.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('authentication.id', 'desc');
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

          $oResults = new Authentication();

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

        $result = Authentication::create($data);

        if ($result) {
            Session::flash('flash_message', 'authentication added!');
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$authentication = Authentication::findOrFail($id);

        return $authentication;
    }

    public function destroy($id)
    {

        $result =  Authentication::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'authentication deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$authentication = Authentication::findOrFail($id);
       $result= $authentication->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'authentication updated!');
            return true;
        } else {
            return false;
        }

    }

}
