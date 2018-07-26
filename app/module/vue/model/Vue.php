<?php namespace App\module\vue\model;

use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    protected $fillable = [
       "id","email","password","name","birth_day","phone","gender","created_at","updated_at"    ];
    protected $table='vue';

    public $timestamps =true ;

    protected $guarded = [];








}
