<?php namespace App\module\translation\admin\repository;

use Session;
use App\module\translation\model\Translation;
use App\module\translation\admin\Repository\TranslationContract;

class EloquentTranslationRepository implements TranslationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Translation();


if(canAccess('admin.translation.allData')) {

}elseif(canAccess('admin.translation.groupData')){
$oResults = $oResults->where('translation.user_id','=',  \Auth::user()->id);
}elseif(canAccess('admin.translation.userData')){

}else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('translation.id', '=' , $data['id']);
        }
        if (isset($data['translate_en']) && !empty($data['translate_en'])) {
            $oResults = $oResults->where('translation.translate_en', '=' , $data['translate_en']);
        }
        if (isset($data['translate_ar']) && !empty($data['translate_ar'])) {
            $oResults = $oResults->where('translation.translate_ar', '=' , $data['translate_ar']);
        }
        if (isset($data['translate_before_en']) && !empty($data['translate_before_en'])) {
            $oResults = $oResults->where('translation.translate_before_en', '=' , $data['translate_before_en']);
        }
        if (isset($data['translate_after_en']) && !empty($data['translate_after_en'])) {
            $oResults = $oResults->where('translation.translate_after_en', '=' , $data['translate_after_en']);
        }
        if (isset($data['translate_before_ar']) && !empty($data['translate_before_ar'])) {
            $oResults = $oResults->where('translation.translate_before_ar', '=' , $data['translate_before_ar']);
        }
        if (isset($data['translate_after_ar']) && !empty($data['translate_after_ar'])) {
            $oResults = $oResults->where('translation.translate_after_ar', '=' , $data['translate_after_ar']);
        }
        if (isset($data['user_id']) && !empty($data['user_id'])) {
            $oResults = $oResults->where('translation.user_id', '=' , $data['user_id']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('translation.status', '=' , $data['status']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('translation.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('translation.id', 'desc');
}


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
             $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
             $oResults = $oResults->paginate(config('translationmemory.pagination_size'), ['*'], $data['page_name']);
        }else{
             $oResults = $oResults->paginate(config('translationmemory.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

          $oResults = new Translation();

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

        $result = Translation::create($data);

        if ($result) {
            Session::flash('flash_message', 'translation added!');
            return $result;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$translation = Translation::findOrFail($id);

        return $translation;
    }

    public function destroy($id)
    {

        $result =  Translation::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'translation deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$translation = Translation::findOrFail($id);
       $result= $translation->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'translation updated!');
            return true;
        } else {
            return false;
        }

    }

}
