<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentAttachmentsTable extends Migration
{
    /* ++++++++++++++++++++++++++++ up() ++++++++++++++++++++++++++++ */
    public function up()
    {
        Schema::create('parent_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->nullable();
            // foreign key
            $table->bigInteger('parent_id')->unsigned();
            $table->timestamps();
        });
    }
    /* ++++++++++++++++++++++++++++ down() ++++++++++++++++++++++++++++ */
    public function down()
    {
        Schema::dropIfExists('parent_attachments');
    }
}
