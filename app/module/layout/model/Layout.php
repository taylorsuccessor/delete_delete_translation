<?php namespace App\module\layout\model;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = [
       "id","slug"    ];
    protected $table='layout';

    public $timestamps =true ;

    protected $guarded = [];








}
