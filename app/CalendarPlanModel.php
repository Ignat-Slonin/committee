<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarPlanModel extends Model
{
    protected $table="CalendarPlan"; //нзвание таблицы в базе
    protected $fillable=['year','month','id_ExecutivePrimary'];


    public function event()
    {
        return $this->hasMany('App\EventsBaslineModel','id_CalendarPlan');
    }

    public function executive()
    {
        return $this->belongsTo('App\ExecutiveCommitteePrimaryModel','id_ExecutivePrimary');
    }
} 

