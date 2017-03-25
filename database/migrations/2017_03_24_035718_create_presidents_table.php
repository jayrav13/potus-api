<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('presidents', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('number')->unique();
            $table->string('previous_office')->nullable();
            $table->string('presidency_url')->nullable();
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

        Schema::dropIfExists('presidents');

    }
}
