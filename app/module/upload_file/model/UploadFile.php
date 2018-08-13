<?php namespace App\module\upload_file\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFile extends Model
{
    use SoftDeletes;

    protected $fillable = [
       "id","user_id","upload_group_id","name","original_name","new_name","upload_base_url","detail","created_at","updated_at"    ];
    protected $table='upload_file';

    public $timestamps =true ;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\module\user\model\User');
    }

    public function getFullFileUrlAttribute(){

        return env('USE_UPLOAD_BASE_URL')?
            env('UPLOAD_BASE_URL').$this->new_name:
            $this->upload_base_url.$this->new_name;
    }

    public function getFileIconImageAttribute(){

        if(in_array($this->extention,config('module.image_extension'))){
            return $this->full_file_url;
        }


        if(array_key_exists($this->extention,config('module.extension_icon'))){
           return config('module.extension_icon')[$this->extention];
        }

        return '/images/file_icons/error.png';
    }

    public function getExtentionAttribute(){
     return substr(strrchr($this->new_name,'.'),1);
    }



}
