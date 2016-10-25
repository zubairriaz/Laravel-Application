<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected  $fillable =['file'];
    protected $uploads = '/images/';
    /**
     * @return array
     */
    public function User()
    {
        return $this->hasOne('App\User');
    }

    /**
     * @return array
     */

    public  function post (){
        return $this->hasOne('App\Post');
    }
    public function getFileAttribute($photo)
    {
        return $this->uploads.$photo;
    }
}
