<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AgentDepartment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FullName');
            $table->string('Phone');
            $table->integer('id_Department')->unsigned();
            $table->integer('id_PostDepartment')->unsigned();
            $table->timestamps();
             $table->foreign('id_Department')
                ->references('id')->on('Department')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_PostDepartment')
                ->references('id')->on('PostDepartment')
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
        Schema::drop('AgentDepartment');
    }
}
