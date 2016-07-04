<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostExecutiveBodyModel extends Model
{
    protected $table="PostExecutiveBody"; //нзвание таблицы в базе
    protected $fillable=['name'];

    public function agent()
    {
        return $this->hasMany('App\EventPrimaryModel','id_PostExecutiveBody');
    }
}
