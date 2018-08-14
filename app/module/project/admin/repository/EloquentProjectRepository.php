<?php namespace App\module\project\admin\repository;

use Session;
use App\module\project\model\Project;
use App\module\project\admin\Repository\ProjectContract;




use App\module\project\event\Create as eCreate;
use App\module\project\event\Edit as eEdit;
use App\module\project\event\Delete as eDelete;

class EloquentProjectRepository implements ProjectContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Project();


        if(canAccess('admin.project.allData')) {

        }elseif(canAccess('admin.project.groupData')){
            $oResults = $oResults->where('project.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.project.userData')){

        }else{return [];}

                if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('project.id', '=' , $data['id']);
        }
                if (isset($data['user_id']) && !empty($data['user_id'])) {
            $oResults = $oResults->where('project.user_id', '=' , $data['user_id']);
        }
                if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('project.name', '=' , $data['name']);
        }
                if (isset($data['from_language']) && !empty($data['from_language'])) {
            $oResults = $oResults->where('project.from_language', '=' , $data['from_language']);
        }
                if (isset($data['to_language']) && !empty($data['to_language'])) {
            $oResults = $oResults->where('project.to_language', '=' , $data['to_language']);
        }
                if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('project.status', '=' , $data['status']);
        }
                if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('project.created_at', '=' , $data['created_at']);
        }
                if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('project.updated_at', '=' , $data['updated_at']);
        }
        

        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('project.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('project.id', 'desc');
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

        $oResults = new Project();

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

        $result = Project::create($data);

        if ($result) {
            Session::flash('flash_message', trans('general.rowAddedSuccessfully'));
           event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $project = Project::findOrFail($id);

        return $project;
    }

    public function destroy($id)
    {

        $old=Project::find($id)->toJson();
        $result =  Project::destroy($id);

        if ($result) {
            Session::flash('flash_message', trans('general.rowDeletedSuccessfully'));
          event(new eDelete($old));
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $model = Project::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());

        if ($result) {
            Session::flash('flash_message', trans('general.rowUpdatedSuccessfully') );

           event(new eEdit($oldModel,$model));
            return $model;
        } else {
            return false;
        }

    }

}
