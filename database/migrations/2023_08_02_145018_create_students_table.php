<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            // $table->string('email')->unique();
            // list of "emails"
            $table->json('email', 30)->nullable();
            $table->string('password');
            // Foreign Key : gender_id
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            // Foreign Key : nationalitie_id
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            // Foreign Key : blood_id
            $table->bigInteger('blood_id')->unsigned();
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade');
            $table->date('Date_Birth');
            // Foreign Key : Grade_id
            $table->bigInteger('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            // Foreign Key : Classroom_id
            $table->bigInteger('Classroom_id')->unsigned();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            // Foreign Key : section_id
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            // Foreign Key : parent_id
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade');
            // academic_year column
            $table->string('academic_year');
            // "created_at" , "updated_at" Column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
