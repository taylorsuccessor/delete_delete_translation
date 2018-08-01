<?php namespace App\module\translation\model;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
       "id","translate_en","translate_ar","translate_before_en","translate_after_en","translate_before_ar","translate_after_ar","user_id","status"    ];
    protected $table='translation';

    public $timestamps =true ;

    protected $guarded = [];








}
