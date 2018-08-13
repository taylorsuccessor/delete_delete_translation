<?php namespace App\module\user_notification\admin\repository;

use Session;
use App\module\user_notification\model\UserNotification;
use App\module\user_notification\admin\Repository\UserNotificationContract;




use App\module\user_notification\event\Create as eCreate;
use App\module\user_notification\event\Edit as eEdit;
use App\module\user_notification\event\Delete as eDelete;

class EloquentUserNotificationRepository implements UserNotificationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new UserNotification();


        if(canAccess('admin.user_notification.allData')) {

        }elseif(canAccess('admin.user_notification.groupData')){
            $oResults = $oResults->where('user_notification.user_id','=',  \Auth::user()->id);
        }elseif(canAccess('admin.user_notification.userData')){

        }else{return [];}

                if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('user_notification.id', '=' , $data['id']);
        }
                if (isset($data['user_id']) && !empty($data['user_id'])) {
            $oResults = $oResults->where('user_notification.user_id', '=' , $data['user_id']);
        }
                if (isset($data['title']) && !empty($data['title'])) {
            $oResults = $oResults->where('user_notification.title', '=' , $data['title']);
        }
                if (isset($data['body']) && !empty($data['body'])) {
            $oResults = $oResults->where('user_notification.body', '=' , $data['body']);
        }
                if (isset($data['url']) && !empty($data['url'])) {
            $oResults = $oResults->where('user_notification.url', '=' , $data['url']);
        }
                if (isset($data['is_read']) && !empty($data['is_read'])) {
            $oResults = $oResults->where('user_notification.is_read', '=' , $data['is_read']);
        }
                if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('user_notification.created_at', '=' , $data['created_at']);
        }
                if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('user_notification.updated_at', '=' , $data['updated_at']);
        }
        

        if ($statistic !== null) {
            $statistic = $this->getStatistic(clone $oResults);
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('user_notification.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('user_notification.id', 'desc');
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

        $oResults = new UserNotification();

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

        $result = UserNotification::create($data);

        if ($result) {
            Session::flash('flash_message', 'user_notification added!');
            event(new eCreate($result));
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $user_notification = UserNotification::findOrFail($id);

        return $user_notification;
    }

    public function destroy($id)
    {

        $old=UserNotification::find($id)->toJson();
        $result =  UserNotification::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'user_notification deleted!');
            event(new eDelete($old));
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $model = UserNotification::findOrFail($id);
        $oldModel=$model->toArray();
        $result= $model->update(is_array($data)? $data:$data->all());

        if ($result) {
            Session::flash('flash_message', 'user_notification updated!');
            event(new eEdit($oldModel,$model));
            return true;
        } else {
            return false;
        }

    }

    public  function markUserNotificationAsRead(){
        return UserNotification::where('user_id','=',\Auth::user()->id)
            ->where('is_read','=',false)->update(['is_read'=>true]);
    }
}
