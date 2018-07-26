<?php namespace App\module\layout\admin\repository;

use Session;
use App\module\layout\model\Layout;
use App\module\layout\admin\Repository\LayoutContract;

class EloquentLayoutRepository implements LayoutContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Layout();


if(canAccess('admin.layout.allData')) {

}elseif(canAccess('admin.layout.groupData')){
$oResults = $oResults->where('layout.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.layout.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('layout.id', '=' , $data['id']);
        }
        if (isset($data['slug']) && !empty($data['slug'])) {
            $oResults = $oResults->where('layout.slug', '=' , $data['slug']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('layout.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('layout.id', 'desc');
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

          $oResults = new Layout();

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

        $result = Layout::create($data);

        if ($result) {
            Session::flash('flash_message', 'layout added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$layout = Layout::findOrFail($id);

        return $layout;
    }

    public function destroy($id)
    {

        $result =  Layout::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'layout deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$layout = Layout::findOrFail($id);
       $result= $layout->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'layout updated!');
            return true;
        } else {
            return false;
        }

    }

}
