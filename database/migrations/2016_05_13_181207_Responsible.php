<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responsible extends Migration
{
    public function up()
    {
        Schema::create('Responsible', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_AgentDepartment')
                ->unsigned()
                ->nullable();
            $table->integer('id_EventsBasline')->unsigned();
            $table->integer('id_AgentExecutiveCommitteeBasic')
                ->unsigned()
                ->nullable();
            $table->timestamps();
            $table->foreign('id_AgentDepartment')
                ->references('id')->on('AgentDepartment')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_EventsBasline')
                ->references('id')->on('EventsBasline')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_AgentExecutiveCommitteeBasic')
                ->references('id')->on('AgentExecutiveCommitteeBasic')
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
        Schema::drop('Responsible');
    }
}
