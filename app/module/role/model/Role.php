<?php namespace App\module\role\model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
       "id","slug","name",'allow_permission','deny_permission'    ];
    protected $table='role';

    public $timestamps =true ;

    protected $guarded = [];








}
