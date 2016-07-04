<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPrimaryModel extends Model
{
    protected $table="EventPrimary"; //нзвание таблицы в базе
    protected $fillable=['Name','monthEvent','id_PlanPrimaryLevel','id_AgentCommitteePrimary'];

    public function plan()
    {
        return $this->belongsTo('App\PlanPrimaryModel','id_PlanPrimaryLevel');
    }

    

    public function agent()
    {
        return $this->belongsTo('App\AgentExecutiveCommitteePrimaryModel','id_AgentCommitteePrimary');
    }

}
