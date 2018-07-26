<?php namespace App\module\notification\website\repository;

use Session;
use App\module\notification\model\Notification;
use App\module\notification\website\Repository\NotificationContract;

class EloquentNotificationRepository implements NotificationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Notification();


        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('notification.id', '=' , $data['id']);
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('notification.name', '=' , $data['name']);
        }
        if (isset($data['title']) && !empty($data['title'])) {
            $oResults = $oResults->where('notification.title', '=' , $data['title']);
        }
        if (isset($data['type']) && !empty($data['type'])) {
            $oResults = $oResults->where('notification.type', '=' , $data['type']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('notification.status', '=' , $data['status']);
        }
        if (isset($data['to_field']) && !empty($data['to_field'])) {
            $oResults = $oResults->where('notification.to_field', '=' , $data['to_field']);
        }
        if (isset($data['to_email']) && !empty($data['to_email'])) {
            $oResults = $oResults->where('notification.to_email', '=' , $data['to_email']);
        }
        if (isset($data['language']) && !empty($data['language'])) {
            $oResults = $oResults->where('notification.language', '=' , $data['language']);
        }
        if (isset($data['data']) && !empty($data['data'])) {
            $oResults = $oResults->where('notification.data', '=' , $data['data']);
        }
        if (isset($data['body']) && !empty($data['body'])) {
            $oResults = $oResults->where('notification.body', '=' , $data['body']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('notification.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('notification.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('notification.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('notification.id', 'desc');
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

          $oResults = new Notification();

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

        $result = Notification::create($data);

        if ($result) {
            Session::flash('flash_message', 'notification added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$notification = Notification::findOrFail($id);

        return $notification;
    }

    public function destroy($id)
    {

        $result =  Notification::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'notification deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$notification = Notification::findOrFail($id);
       $result= $notification->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'notification updated!');
            return true;
        } else {
            return false;
        }

    }

}
