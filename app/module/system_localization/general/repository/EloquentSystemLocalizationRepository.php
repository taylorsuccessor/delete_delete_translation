<?php namespace App\module\system_localization\general\repository;

use Session;
use App\module\system_localization\model\SystemLocalization;
use App\module\system_localization\general\Repository\SystemLocalizationContract;




use App\module\system_localization\event\Create as eCreate;
use App\module\system_localization\event\Edit as eEdit;
use App\module\system_localization\event\Delete as eDelete;

class EloquentSystemLocalizationRepository implements SystemLocalizationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new SystemLocalization();


        if(canAccess('admin.system_localization.allData')) {

        }elseif(canAccess('admin.system_localization.groupData')){
            $oResults = $oResults->where('system_localization.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.system_localization.userData')){

        }else{return [];}

                if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('system_localization.id', '=' , $data['id']);
        }
                if (isset($data['key']) && !empty($data['key'])) {
            $oResults = $oResults->where('system_localization.key', '=' , $data['key']);
        }
                if (isset($data['en']) && !empty($data['en'])) {
            $oResults = $oResults->where('system_localization.en', '=' , $data['en']);
        }
                if (isset($data['ar']) && !empty($data['ar'])) {
            $oResults = $oResults->where('system_localization.ar', '=' , $data['ar']);
        }
        

        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('system_localization.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('system_localization.id', 'desc');
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

        $oResults = new SystemLocalization();

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

        $result = SystemLocalization::create($data);

        if ($result) {
            Session::flash('flash_message', trans('general.rowAddedSuccessfully'));
           // event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $system_localization = SystemLocalization::findOrFail($id);

        return $system_localization;
    }

    public function destroy($id)
    {

        $old=SystemLocalization::find($id)->toJson();
        $result =  SystemLocalization::destroy($id);

        if ($result) {
            Session::flash('flash_message', trans('general.rowDeletedSuccessfully'));
          //  event(new eDelete($old));
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $model = SystemLocalization::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());

        if ($result) {
            Session::flash('flash_message', trans('general.rowUpdatedSuccessfully') );

           // event(new eEdit($oldModel,$model));
            return true;
        } else {
            return false;
        }

    }

}
