<?php

namespace App\module\system_localization\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\system_localization\admin\request\createRequest;
use App\module\system_localization\admin\request\editRequest;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\system_localization\model\SystemLocalization as mSystemLocalization;
use App\module\system_localization\admin\repository\SystemLocalizationContract as rSystemLocalization;

use App\module\system_localization\admin\controller\CreateVueJsTranslation;

class SystemLocalization extends Controller
{
    private $rSystemLocalization;

    public function __construct(rSystemLocalization $rSystemLocalization)
    {
        $this->rSystemLocalization=$rSystemLocalization;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view as response
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rSystemLocalization->getByFilter($request,$statistic);

        if(!isset($request->ajaxRequest)){
            return view('admin.system_localization::index', compact('oResults','request','statistic'));
        }


        $aResults=[];

        if(count($oResults)){
            foreach($oResults as $oResult){
                $aResults[$oResult->id]=[

                    'id'=>  $oResult->id,

                    'key'=>  $oResult->key,

                    'en'=>  $oResult->en,

                    'ar'=>  $oResult->ar,

                ];
            }
        }

        return new JsonResponse(['data'=>$aResults,'total'=>$oResults->total(),'statistic'=>$statistic],200,[],JSON_UNESCAPED_UNICODE);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.system_localization::create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rSystemLocalization->create($request->all());

        $this-> createVueTranslation();
        return redirect('admin/system_localization');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request)
    {


        $system_localization=$this->rSystemLocalization->show($id);

        if(isset($request->ajaxRequest)){
            return new JsonResponse(['status'=>'success','data'=>$system_localization],200,[],JSON_UNESCAPED_UNICODE);
        }



        $request->merge(['system_localization_id'=>$id,'page_name'=>'page']);



        return view('admin.system_localization::show', compact('system_localization','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id)
    {


        $system_localization=$this->rSystemLocalization->show($id);


        return view('admin.system_localization::edit', compact('system_localization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {

        $result=$this->rSystemLocalization->update($id,$request);
        $this-> createVueTranslation();
        return redirect(route('admin.system_localization.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function destroy($id,Request $request)
    {
        $system_localization=$this->rSystemLocalization->destroy($id);

        if(!isset($request->ajaxRequest)){
            return redirect(route('admin.system_localization.index'));
        }

        return new JsonResponse(['status'=>'success'],200,[],JSON_UNESCAPED_UNICODE);
    }

    public function createVueTranslation(){

//        new CreateVueJsTranslation('en');
//        new CreateVueJsTranslation('ar');
        $this->createVueTranslationFromDb('en');
        $this->createVueTranslationFromDb('ar');
        return Redirect::back();
    }





    private function createVueTranslationFromDb($lang){
        $translationList=[];
        $reusltList=mSystemLocalization::all();
        foreach($reusltList as $row){
            $translationList[$row->key]=$row->{$lang};
        }
        $view='admin.system_localization::vue_translation_js';

        $data=['translationList'=>$translationList];
        file_put_contents(public_path('js/vue_translation/'.$lang.'.js'),view($view,$data)->render());

    }


    public function migrateTranslateFromFileToDb(){

        $this->migrateOneTranslateFromFileToDb('en');
        $this->migrateOneTranslateFromFileToDb('ar');

        return Redirect::back();
    }

    private function migrateOneTranslateFromFileToDb($lang)
    {
        $createVueJsTranslation = new CreateVueJsTranslation($lang);
        $translationList = $createVueJsTranslation->getTranslationList();

        foreach ($translationList as $key => $translation) {
            if (is_array($translation)) {
                continue;
            }
            $translationRow = mSystemLocalization::where('key', '=', $key)->first();
            if ($translationRow) {
                $translationRow->{$lang} = $translation;
                $translationRow->save();
            } else {
                mSystemLocalization::create(['key' => $key, $lang => $translation]);
            }
        }


    }

}
