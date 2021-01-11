<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    // create the tags table
    // it's a termlist so call the string column first_name
    Schema::create("treatments", function (Blueprint $table) {
    $table->id();
    $table->string("name", 30);
    });

    // create the pivot table using the Eloquent naming convention
    Schema::create("animal_treatment", function (Blueprint $table) {

    // still have an id column
    $table->id();
    
    //  animal id column and foreign key
    $table->foreignId("animal_id")->unsigned();
    $table->foreign("animal_id")->references("id")
    ->on("animals")->onDelete("cascade");

    //  treatment id column and foreign key
    $table->foreignId("treatment_id")->unsigned();
    $table->foreign("treatment_id")->references("id")
    ->on("treatments")->onDelete("cascade");
    });
    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('animal_treatment');
    }
}
