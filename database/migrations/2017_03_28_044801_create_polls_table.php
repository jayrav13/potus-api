<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('polls', function(Blueprint $table) {

            $table->increments('id');
            $table->text('polling_group');
            $table->integer('approval');
            $table->integer('disapproval');
            $table->integer('unsure');
            $table->integer('net');
            $table->integer('sample_size')->nullable();
            $table->string('population')->nullable();

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();

            $table->integer('president_id')->unsigned();
            $table->foreign('president_id')->references('id')->on('presidents');

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

        Schema::dropIfExists('polls');

    }
}
