<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsBaslineModel extends Model
{
    protected $table="EventsBasline";
    protected $fillable=['id_CalendarPlan','day','id_EventPrimary','id_AgentCommitteePrimary'];

    public function plan()
    {
        return $this->belongsTo('App\CalendarPlanModel','id_CalendarPlan');
    }


    public function event()
    {
        return $this->belongsTo('App\EventPrimaryModel','id_EventPrimary');
    }


    public function agent()
    {
        return $this->belongsTo('App\AgentExecutiveCommitteePrimaryModel','id_AgentCommitteePrimary');
    }
}
