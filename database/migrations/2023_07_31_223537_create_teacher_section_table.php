<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // +++++++++++++++ Many To Many Relationship : Pivot Table "teacher_section" +++++++++++++++
        // M:M Relationship => "one teacher" can teach for "many sections" , And "one section" can be teached by "many teachers"
        Schema::create('teacher_section', function (Blueprint $table) {
            $table->id();
            // =========== Foreign key : teacher_id ===========
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            // =========== Foreign key : section_id ===========
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('teacher_section');
    }
}
