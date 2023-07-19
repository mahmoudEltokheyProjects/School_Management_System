<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalitiesTable extends Migration
{
    // ++++++++++++ up() ++++++++++++
    public function up()
    {
        Schema::create('nationalities', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });
    }
    // ++++++++++++ down() ++++++++++++
    public function down()
    {
        Schema::dropIfExists('nationalities');
    }
}
