<?php namespace App\module\project\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
       "id","user_id","name","from_language","to_language","status","created_at","updated_at"    ];
    protected $table='project';

    public $timestamps =true ;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\module\user\model\User');
    }





}
