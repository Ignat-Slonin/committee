<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventPrimary extends Migration
{
    public function up()
    {
        Schema::create('EventPrimary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');            
            $table->string('monthEvent');
            $table->integer('id_PlanPrimaryLevel')->unsigned();
            $table->integer('id_AgentCommitteePrimary')->unsigned();
            $table->timestamps();
            $table->foreign('id_PlanPrimaryLevel')
                ->references('id')->on('PlanPrimaryLevel')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_AgentCommitteePrimary')
                ->references('id')->on('AgentCommitteePrimary')
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
        Schema::drop('EventPrimary');
    }
}
