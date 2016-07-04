<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarPlan extends Migration
{
    public function up()
    {
        Schema::create('CalendarPlan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('month');
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
        Schema::drop('CalendarPlan');
    }
}
