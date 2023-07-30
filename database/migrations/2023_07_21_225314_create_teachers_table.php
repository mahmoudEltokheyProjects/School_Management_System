<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            // "id" column
            $table->id();
            // "Email" column
            $table->string('Email')->unique();
            // "Password" column
            $table->string('Password');
            // "teacher_name" column
            $table->string('Name');
            // ++++++++++ Foreign key : "Gender_id" : نوع بتاع المدرس سواء ذكر او انثي   ++++++++++
            // foreign key هعمل جدول خاص بالنوع لان هيكون ليه ترجمة عربي و انجليزي فهعمل له
            $table->unsignedBigInteger('Gender_id');
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            // ++++++++++ Foreign key : "Specialization_id" : التخصص بتاع المدرس ++++++++++
            $table->unsignedBigInteger('Specialization_id');
            $table->foreign('Specialization_id')->references('id')->on('specializations')->onDelete('cascade')->onUpdate('cascade');
            // "Joining_Date" column
            $table->date('Joining_Date');
            // "Address" column
            $table->text('Address');
            // "created_at" And "updated_at" column
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
        Schema::dropIfExists('teachers');
    }
}
