<?php namespace App\module\system_localization\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemLocalization extends Model
{
    use SoftDeletes;

    protected $fillable = [
       "id","key","en","ar"    ];
    protected $table='system_localization';

    public $timestamps =true ;

    protected $guarded = [];





}
