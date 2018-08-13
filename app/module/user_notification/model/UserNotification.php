<?php namespace App\module\user_notification\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotification extends Model
{
    //use SoftDeletes;

    protected $fillable = [
       "id","user_id","title","body","url","is_read","created_at","updated_at"    ];
    protected $table='user_notification';

    public $timestamps =true ;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\module\user\model\User');
    }

    public function getUserEmailAttribute(){

        return (isset($this->user->id)) ? $this->user->email : '';
    }

    public function is_read(){

        return $this->is_read? trans('user_notification::user_notification.read'):trans('user_notification::user_notification.notRead');
}




}
