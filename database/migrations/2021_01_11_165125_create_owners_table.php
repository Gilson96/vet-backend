<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string("first_name", 20);
            $table->string("last_name", 20);
            $table->string("telephone", 11);
            $table->string("email", 50);
            $table->string("address_1", 30);
            $table->string("address_2", 30)->nullable();
            $table->string("town", 20);
            $table->string("postcode", 7);
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
        Schema::dropIfExists('owners');
    }
}
