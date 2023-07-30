<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    // +++++++++++++++++++++++ up() +++++++++++++++++++++++
    public function up()
    {
        // ------------------------------------------- Parents Relationships -------------------------------------------
        Schema::table('my__parents', function(Blueprint $table) {
            // ================================== Father Relationships ==================================
            // Relationship Between : "My_Parents" And "nationalities" Table Using Foreign_key="Nationality_Father_id"
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            // Relationship Between : "My_Parents" And "type__bloods" Table Using Foreign_key="Blood_Type_Father_id"
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            // Relationship Between : "my_parents" And "religions" Table Using Foreign_key="Religion_Father_id"
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            // ================================== Mother Relationships ==================================
            // Relationship Between : "My_Parents" And "nationalities" Table Using Foreign_key="Nationality_Mother_id"
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            // Relationship Between : "My_Parents" And "type__bloods" Table Using Foreign_key="Blood_Type_Mother_id"
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            // Relationship Between : "my_parents" And "religions" Table Using Foreign_key="Religion_Mother_id"
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
        });
        // ------------------------------------------- parent_attachments Relationships -------------------------------------------
        Schema::table('parent_attachments', function(Blueprint $table) {
            // Relationship Between : "my_parents" And "Parent_Attachments" Table Using Foreign_key="parent_id"
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /* +++++++++++++++++++++++ down() +++++++++++++++++++++++ */
    public function down()
    {

    }
}
