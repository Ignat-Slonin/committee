<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExecutiveCommitteePrimaryModel extends Model
{
    protected $table="ExecutiveCommitteePrimary"; //нзвание таблицы в базе
    protected $fillable=['name','address','basic'];

    public function plan()
    {
        return $this->hasMany('App\PlanPrimaryModel','id_ExecutivePrimary');
    }
}
