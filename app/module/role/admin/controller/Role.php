<?php

namespace App\module\role\admin\controller;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\module\role\admin\request\createRequest;
use App\module\role\admin\request\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\module\role\model\Role as mRole;
use App\module\role\admin\repository\RoleContract as rRole;
class Role extends Controller
{
    private $rRole;

    public function __construct(rRole $rRole)
    {
        $this->rRole=$rRole;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rRole->getByFilter($request);

        return view('admin.role::index', compact('oResults'), compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
        return view('admin.role::create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRole->create($request->all());

        return redirect('admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id,Request $request)
    {


        $role=$this->rRole->show($id);

        $role['permissionOneText']=explode('|',$role->allow_permission);
        $role['denyPermissionOneText']=explode('|',$role->deny_permission);

        return view('admin.role::show', compact('role','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id,Request $request)
    {


        $role=$this->rRole->show($id);
        $role['permissionOneText']=explode('|',$role->allow_permission);
        $role['denyPermissionOneText']=explode('|',$role->deny_permission);

        return view('admin.role::edit', compact('role','request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, editRequest $request)
    {

        $result=$this->rRole->update($id,$request);



        return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $role=$this->rRole->destroy($id);
        return redirect('admin/role');
    }


}
