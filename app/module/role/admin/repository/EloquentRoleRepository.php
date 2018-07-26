<?php namespace App\module\role\admin\repository;

use Session;
use App\module\role\model\Role;
use App\module\role\model\RoleUser;
use App\module\role\admin\Repository\RoleContract;

class EloquentRoleRepository implements RoleContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Role();


        if(canAccess('admin.role.allData')) {

        }elseif(canAccess('admin.role.groupData')){
            $oResults = $oResults->where('role.users_id','=',  current_user()->getUser()->id);
        }elseif(canAccess('admin.role.userData')){

        }else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('role.id', '=' , $data['id']);
        }
        if (isset($data['slug']) && !empty($data['slug'])) {
            $oResults = $oResults->where('role.slug', 'like' , '%'.$data['slug'].'%');
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('role.name', 'like' , '%'.$data['name'].'%');
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('role.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('role.updated_at', '=' , $data['updated_at']);
        }


        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('role.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('role.id', 'desc');
        }


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
            $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
            $oResults = $oResults->paginate(config('deera.pagination_size'), ['*'], $data['page_name']);
        }else{
            $oResults = $oResults->paginate(config('deera.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){
        $oResults = new Role();

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

        $result = Role::create($data);

        if ($result) {
            Session::flash('flash_message', 'role added!');
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $role = Role::findOrFail($id);

        return $role;
    }

    public function destroy($id)
    {

        $result =  Role::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'role deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
        $role = Role::findOrFail($id);
        $result= $role->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'role updated!');
            return true;
        } else {
            return false;
        }

    }

    public function assignUserRole($user_id, $roleList)
    {
        $roles = (is_array($roleList)) ? $roleList : [$roleList];
        $rows = [];
        $result = false;
        foreach ($roleList as $role_id) {
            $rows[] = ['user_id' => $user_id, 'role_id' => $role_id];
        }

        $deleteResult = RoleUser::where(['user_id' => $user_id])->delete();
        if (count($rows)) {
            $result = RoleUser::insert($rows);
        }
        return $result;
    }
}
