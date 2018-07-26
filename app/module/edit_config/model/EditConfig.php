<?php namespace App\module\edit_config\model;

use Illuminate\Database\Eloquent\Model;

class EditConfig extends Model
{
    protected $fillable = [
       "id","key","value","created_at","updated_at"    ];
    protected $table='edit_config';

    public $timestamps =true ;

    protected $guarded = [];








}
