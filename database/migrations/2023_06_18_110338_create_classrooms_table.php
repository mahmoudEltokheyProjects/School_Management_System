<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    // ++++++++++++ up() ++++++++++++
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('Name_Class');
            // Foreign key : Grade_id
            $table->bigInteger('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    // ++++++++++++ down() ++++++++++++
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
