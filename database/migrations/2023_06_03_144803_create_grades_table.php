<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    // ++++++++++++ up() ++++++++++++
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->string('Notes')->nullable();
            $table->timestamps();
        });
    }
    // ++++++++++++ down() ++++++++++++
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
