<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentCommitteePrimary extends Migration
{
    public function up()
    {
        Schema::create('AgentCommitteePrimary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FullName');
            $table->string('password');
            $table->string('Phone');
            $table->integer('id_ExecutiveCommitteePrimary')->unsigned();
            $table->integer('id_PostExecutiveBody')->unsigned();
            $table->timestamps();
            $table->foreign('id_ExecutiveCommitteePrimary')
                ->references('id')->on('ExecutiveCommitteePrimary')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_PostExecutiveBody')
                ->references('id')->on('PostExecutiveBody')
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
        Schema::drop('AgentCommitteePrimary');
    }
}
