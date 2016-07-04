<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentExecutiveCommitteeBasic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AgentExecutiveCommitteeBasic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FullName');
            $table->string('Phone');
            $table->integer('id_ExecutiveCommitteeBasic')->unsigned();
            $table->integer('id_PostExecutiveBody')->unsigned();
            $table->timestamps();
            $table->foreign('id_ExecutiveCommitteeBasic')
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
        Schema::drop('AgentExecutiveCommitteeBasic');
    }
}
