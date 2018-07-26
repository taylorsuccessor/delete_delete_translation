<?php

namespace App\module\user\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\user\admin\request\createRequest;
use App\module\user\admin\request\editRequest;

use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\user\model\User as mUser;
use App\module\user\admin\repository\UserContract as rUser;


use App\module\role\admin\repository\RoleContract as rRole;



class User extends Controller
{
    private $rUser;
    private $rRole;

    public function __construct(rUser $rUser,rRole $rRole)
    {
        $this->rUser=$rUser;
        $this->rRole=$rRole;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rUser->getByFilter($request,$statistic);

        return view('admin.user::index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {

        $roleList=$this->rRole->getAllList();
        return view('admin.user::create',compact('request','roleList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {



        $request->merge([ 'password' => bcrypt($request->password)]);
        $oResults=$this->rUser->create($request->all());
        if($oResults  && isset($request->role) && count($request->role)){
            $this->rRole->assignUserRole($oResults->id,$request->role);
        }
        return redirect('admin/user');
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


        $user=$this->rUser->show($id);
        $request->merge(['user_id'=>$id,'page_name'=>'page']);



        return view('admin.user::show', compact('user','request'));
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


        $user=$this->rUser->show($id);


        $roleList=$this->rRole->getAllList();
        $userRoleList=$user->role_list();

        return view('admin.user::edit', compact('user','roleList','userRoleList'));
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
        if($request->has('password') && $request->password !=''){

            $request->merge([ 'password' => bcrypt($request->password)]);
        }elseif($request->has('password') && $request->password ==''){

            $request->request->remove('password');
        }

        $result=$this->rUser->update($id,$request);
        if($result  && isset($request->role) && count($request->role)){
            $this->rRole->assignUserRole($id,$request->role);
        }

        return redirect(route('admin.user.index'));
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
        $user=$this->rUser->destroy($id);
        return redirect(route('admin.user.index'));
    }


}
