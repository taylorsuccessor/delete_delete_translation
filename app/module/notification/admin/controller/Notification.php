<?php

namespace App\module\notification\admin\controller;

use notification2;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\notification\admin\request\createRequest;
use App\module\notification\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\notification\model\Notification as mNotification;
use App\module\notification\admin\repository\NotificationContract as rNotification;



class Notification extends Controller
{
    private $rNotification;

    public function __construct(rNotification $rNotification)
    {
        $this->rNotification=$rNotification;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

//$testInterface->test();
        $statistic=null;
        $oResults=$this->rNotification->getByFilter($request,$statistic);

        return view('admin.notification::index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        $oResults=$this->rNotification->getByFilter($request);

        if(count($oResults)){
            return  redirect('/admin/notification/'.$oResults->first()->id.'/edit');
        }

        return view('admin.notification::create',compact('request'));
    }




    public function saveBodyToFile($request){

        $filePath=app_path('module/notification/admin/view/template/'.$request->language.'/'.$request->type.'_'.$request->name.'.blade.php');


       // $fh = fopen($filePath, 'w') or die("Can't create file");

        file_put_contents($filePath,$request->body);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */



    public function store(createRequest $request)
    {


        $oResults=$this->rNotification->create($request->all());
        $this->saveBodyToFile($request);

        return redirect('admin/notification');
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


        $notification=$this->rNotification->show($id);
        $request->merge(['notification_id'=>$id,'page_name'=>'page']);



        return view('admin.notification::show', compact('notification','request'));
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


        $notification=$this->rNotification->show($id);


        return view('admin.notification::edit', compact('notification'));
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

        $result=$this->rNotification->update($id,$request);
        $this->saveBodyToFile($request);


        return redirect(route('admin.notification.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $notification=$this->rNotification->destroy($id);
        return redirect(route('admin.notification.index'));
    }


}
