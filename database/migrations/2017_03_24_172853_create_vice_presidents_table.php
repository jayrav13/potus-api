<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVicePresidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vice_presidents', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('number')->unique();
            $table->string('previous_office')->nullable();
            $table->string('party_affiliation')->nullable();

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();

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

        Schema::dropIfExists('vice_presidents');

    }
}
