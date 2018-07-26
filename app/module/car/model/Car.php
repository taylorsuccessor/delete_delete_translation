<?php namespace App\module\car\model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
       "id","name","email","type","phone","created_at","updated_at"    ];
    protected $table='car';

    public $timestamps =true ;

    protected $guarded = [];








}
