<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentExecutiveCommitteePrimaryModel extends Model
{
    protected $table="AgentCommitteePrimary";
    protected $fillable=['FullName','Phone','id_ExecutiveCommitteePrimary','id_PostExecutiveBody'];


    public function executive()
    {
        return $this->belongsTo('App\ExecutiveCommitteePrimaryModel','id_ExecutiveCommitteePrimary');
    }


    public function post()
    {
        return $this->belongsTo('App\PostExecutiveBodyModel','id_PostExecutiveBody');
    }

    public function event()
    {
        return $this->hasMany('App\EventPrimaryModel','id_AgentCommitteePrimary');
    }
    
}



