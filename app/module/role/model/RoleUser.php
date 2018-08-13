<?php namespace App\module\role\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{

    use SoftDeletes;

    protected $fillable = [ "user_id","role_id"   ];
    protected $table='role_user';

    public $timestamps =false ;

    protected $guarded = [];


    public function role(){
        return $this->belongsTo('App\module\role\model\Role');
    }
}