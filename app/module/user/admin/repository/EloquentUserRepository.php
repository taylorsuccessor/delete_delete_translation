<?php namespace App\module\user\admin\repository;

use Session;
use App\module\user\model\User;
use App\module\user\admin\Repository\UserContract;

class EloquentUserRepository implements UserContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new User();


if(canAccess('admin.user.allData')) {

}elseif(canAccess('admin.user.groupData')){
$oResults = $oResults->where('user.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.user.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('user.id', '=' , $data['id']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('user.email', 'like' , '%'.$data['email'].'%');
        }
        if (isset($data['guest_email']) && !empty($data['guest_email'])) {
            $oResults = $oResults->where('user.guest_email', 'like' , '%'.$data['guest_email'].'%');
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $oResults = $oResults->where('user.password', '=' , $data['password']);
        }


        if (isset($data['last_login']) && !empty($data['last_login'])) {
            $oResults = $oResults->where('user.last_login', '=',$data['last_login']);
        }
        if (isset($data['first_name']) && !empty($data['first_name'])) {
            $oResults = $oResults->where('user.first_name', 'like' , '%'.$data['first_name'].'%');
        }
        if (isset($data['last_name']) && !empty($data['last_name'])) {
            $oResults = $oResults->where('user.last_name', 'like' , '%'.$data['last_name'].'%');
        }
        if (isset($data['birth_day']) && !empty($data['birth_day'])) {
            $oResults = $oResults->where('user.birth_day', '=' , $data['birth_day']);
        }

        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('user.phone', 'like' , '%'.$data['phone'].'%');
        }
        if (isset($data['mobile']) && !empty($data['mobile'])) {
            $oResults = $oResults->where('user.mobile', 'like' , '%'.$data['mobile'].'%');
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('user.area_id', '=' , $data['area_id']);
        }
        if (isset($data['country']) && !empty($data['country'])) {
            $oResults = $oResults->where('user.country', '=' , $data['country']);
        }
        if (isset($data['address']) && !empty($data['address'])) {
            $oResults = $oResults->where('user.address', 'like' , '%'.$data['address'].'%');
        }
        if (isset($data['gender']) && !empty($data['gender'])) {
            $oResults = $oResults->where('user.gender', '=' , $data['gender']);
        }
        if (isset($data['occupation']) && !empty($data['occupation'])) {
            $oResults = $oResults->where('user.occupation', '=' , $data['occupation']);
        }
        if (isset($data['type']) &&  $data['type']!=='') {
            $oResults = $oResults->where('user.type', '=' , $data['type']);
        }
        if (isset($data['session_id']) && !empty($data['session_id'])) {
            $oResults = $oResults->where('user.session_id', '=' , $data['session_id']);
        }
        if (isset($data['lat']) && !empty($data['lat'])) {
            $oResults = $oResults->where('user.lat', '=' , $data['lat']);
        }
        if (isset($data['long']) && !empty($data['long'])) {
            $oResults = $oResults->where('user.long', '=' , $data['long']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('user.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('user.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('user.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('user.id', 'desc');
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

          $oResults = new User();

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

        $result = User::create($data);

        if ($result) {
            Session::flash('flash_message', 'user added!');
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$user = User::findOrFail($id);

        return $user;
    }

    public function destroy($id)
    {

        $result =  User::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'user deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$user = User::findOrFail($id);
       $result= $user->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'user updated!');
            return true;
        } else {
            return false;
        }

    }

}
