<?php namespace App\module\upload_file\general\repository;

use Session;
use App\module\upload_file\model\UploadFile;
use App\module\upload_file\general\Repository\UploadFileContract;




use App\module\upload_file\event\Create as eCreate;
use App\module\upload_file\event\Edit as eEdit;
use App\module\upload_file\event\Delete as eDelete;

class EloquentUploadFileRepository implements UploadFileContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new UploadFile();


        if(canAccess('admin.upload_file.allData')) {

        }elseif(canAccess('admin.upload_file.groupData')){
            $oResults = $oResults->where('upload_file.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.upload_file.userData')){

        }else{return [];}


            $oResults = $oResults->where('upload_file.upload_group_id', '=' , $data['upload_group_id']);




                if (isset($data['upload_base_url']) && !empty($data['upload_base_url'])) {
            $oResults = $oResults->where('upload_file.upload_base_url', '=' , $data['upload_base_url']);
        }
                if (isset($data['detail']) && !empty($data['detail'])) {
            $oResults = $oResults->where('upload_file.detail', '=' , $data['detail']);
        }
                if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('upload_file.created_at', '=' , $data['created_at']);
        }
                if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('upload_file.updated_at', '=' , $data['updated_at']);
        }
        

        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('upload_file.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('upload_file.id', 'desc');
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

        $oResults = new UploadFile();

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

        $result = UploadFile::create($data);

        if ($result) {
            Session::flash('flash_message', trans('general.rowAddedSuccessfully') );
            if(!$result->upload_group_id > 0){
                $result->update(['upload_group_id'=>$result->id]);
            }
           // event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $upload_file = UploadFile::findOrFail($id);

        return $upload_file;
    }

    public function destroy($id)
    {

        $old=UploadFile::find($id)->toJson();
        $result =  UploadFile::destroy($id);

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

        $model = UploadFile::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());

        if ($result) {
            Session::flash('flash_message',trans('general.rowUpdatedSuccessfully') );

           // event(new eEdit($oldModel,$model));
            return true;
        } else {
            return false;
        }

    }

}
