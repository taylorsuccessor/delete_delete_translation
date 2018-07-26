<?php namespace App\module\role\model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
       "id","slug","name",'allow_permission','deny_permission'    ];
    protected $table='role';

    public $timestamps =true ;

    protected $guarded = [];








}
