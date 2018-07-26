<?php namespace App\module\edit_config\admin\repository;

use Session;
use App\module\edit_config\model\EditConfig;
use App\module\edit_config\admin\Repository\EditConfigContract;

class EloquentEditConfigRepository implements EditConfigContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new EditConfig();


if(canAccess('admin.edit_config.allData')) {

}elseif(canAccess('admin.edit_config.groupData')){
$oResults = $oResults->where('edit_config.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.edit_config.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('edit_config.id', '=' , $data['id']);
        }
        if (isset($data['key']) && !empty($data['key'])) {
            $oResults = $oResults->where('edit_config.key', '=' , $data['key']);
        }
        if (isset($data['value']) && !empty($data['value'])) {
            $oResults = $oResults->where('edit_config.value', '=' , $data['value']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('edit_config.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('edit_config.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('edit_config.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('edit_config.id', 'desc');
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

          $oResults = new EditConfig();

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

        $result = EditConfig::create($data);

        if ($result) {
            Session::flash('flash_message', 'edit_config added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$edit_config = EditConfig::findOrFail($id);

        return $edit_config;
    }

    public function destroy($id)
    {

        $result =  EditConfig::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'edit_config deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$edit_config = EditConfig::findOrFail($id);
       $result= $edit_config->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'edit_config updated!');
            return true;
        } else {
            return false;
        }

    }

}
