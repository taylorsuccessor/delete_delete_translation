<?php namespace App\module\car\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{

    use SoftDeletes;


    protected $fillable = [
       "id","name","email","type","phone","created_at","updated_at"    ];
    protected $table='car';

    public $timestamps =true ;

    protected $guarded = [];








}
