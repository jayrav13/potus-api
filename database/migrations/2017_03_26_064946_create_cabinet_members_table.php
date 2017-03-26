<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cabinet_members', function(Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->string('department_name');
            $table->string('department_url');
            $table->string('permalink');
            $table->string('url')->nullable();

            $table->string('years')->nullable();
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

        Schema::dropIfExists('cabinet_members');

    }
}
