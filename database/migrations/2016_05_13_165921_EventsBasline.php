<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsBasline extends Migration
{
    public function up()
    {
        Schema::create('EventsBasline', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day');
            $table->integer('id_CalendarPlan')->unsigned();
            $table->integer('id_EventPrimary')->unsigned();
            $table->integer('id_AgentCommitteePrimary')->unsigned();
            $table->timestamps();
            $table->foreign('id_CalendarPlan')
                 ->references('id')->on('CalendarPlan')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
            $table->foreign('id_AgentCommitteePrimary')
                ->references('id')->on('AgentCommitteePrimary')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_EventPrimary')
                ->references('id')->on('EventPrimary')
                ->onDelete('cascade')
                ->onUpdate('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
    public function down()
    {
        Schema::drop('EventsBasline');
    }
}