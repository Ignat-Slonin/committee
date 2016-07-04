<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPrimaryModel extends Model
{
    protected $table="PlanPrimaryLevel";
    protected $fillable=['year','id_ExecutivePrimary'];
   
   
    public function event()
    {
        return $this->hasMany('App\EventPrimaryModel','id_PlanPrimaryLevel');
    }

    public function executive()
    {
        return $this->belongsTo('App\ExecutiveCommitteePrimaryModel','id_ExecutivePrimary');
    }
}
