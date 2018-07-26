<?php namespace App\module\authentication\model;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $fillable = [
       "id","email","password"    ];
    protected $table='authentication';

    public $timestamps =true ;

    protected $guarded = [];








}
