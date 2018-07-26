<?php namespace App\module\notification\model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
       "id","name","title","type","status","to_field","to_email","language","data","body","created_at","updated_at"    ];
    protected $table='notification';

    public $timestamps =true ;

    protected $guarded = [];








}
