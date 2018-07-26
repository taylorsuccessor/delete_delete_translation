<?php namespace App\module\user\model;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        "id","email","guest_email","password","android_device_id","ios_device_id","last_login","first_name","last_name","birth_day","avatar","phone","mobile","area_id","country","address","gender","occupation","type","token","session_id","lat","long","created_at","updated_at"    ];
    protected $table='user';

    public $timestamps =true ;

    protected $guarded = [];


    public function role(){
        return $this->hasManyThrough('App\module\role\model\Role','App\module\role\model\RoleUser','user_id','id','id','role_id');
    }

    public function role_user(){
        return $this->hasMany('App\module\role\model\RoleUser');
    }

    public function role_list(){
        $oRoleList=$this->role_user()->with('role')->get();
        $aRoleList=[];
        if(count($oRoleList)) {
            foreach ($oRoleList as $oneRoleUser) {
                if(isset($oneRoleUser->role->name)){
                    $aRoleList[$oneRoleUser->role->id]=$oneRoleUser->role->name;
                }
        }
        }

        return $aRoleList;
    }

    public function sendPasswordResetNotification($token)
    {
        notification('reset_password',[
            'user'=>$this,
            'token'=>$token
            ]);
        \Session::flash('flash_success','Please check your email Inbox to reset Password.');
    }



}
