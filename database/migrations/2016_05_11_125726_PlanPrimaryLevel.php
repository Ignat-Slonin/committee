<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanPrimaryLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlanPrimaryLevel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('id_ExecutivePrimary')->unsigned();
            $table->timestamps();
            $table->foreign('id_ExecutivePrimary')
                ->references('id')->on('ExecutiveCommitteePrimary')
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
        Schema::drop('PlanPrimaryLevel');
    }
}
