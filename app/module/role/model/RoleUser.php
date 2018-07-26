<?php namespace App\module\role\model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = [ "user_id","role_id"   ];
    protected $table='role_user';

    public $timestamps =false ;

    protected $guarded = [];


    public function role(){
        return $this->belongsTo('App\module\role\model\Role');
    }
}