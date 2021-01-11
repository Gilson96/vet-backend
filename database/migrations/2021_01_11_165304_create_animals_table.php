<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("name", 30);
            $table->string("type", 30);
            $table->string("dob", 30);
            $table->integer("weight");
            $table->integer("height");
            $table->integer("biteyness");
            $table->timestamps();

            //create the owner_id column
            $table->foreignId("owner_id")->unsigned();

            
            $table->foreign("owner_id")->references("id")->on("owners")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');;
    }
}
