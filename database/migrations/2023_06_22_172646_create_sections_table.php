<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    // ++++++++++++ up() ++++++++++++
    public function up()
    {
        Schema::create('sections', function (Blueprint $table)
        {
            // section id
            $table->increments('id');
            // section Name
            $table->string('Name_Section');
            // "Section" can be "active" or "disabled" , "class1_1 , class1_2 , class1_3 , ... , class1_6)"
            $table->integer('Status');
            // foreign key : "Grade_id" column : 1:M Relationship : Between "Grade" And "sections"
            $table->bigInteger('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            // foreign key : "Class_id" column : 1:M Relationship : Between "Classroom" And "sections"
            $table->bigInteger('Class_id')->unsigned();
            $table->foreign('Class_id')->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            // crreated_at , updated_at columns
            $table->timestamps();
        });
    }
    // ++++++++++++ down() ++++++++++++
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
