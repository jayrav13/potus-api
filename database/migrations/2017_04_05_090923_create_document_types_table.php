<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_types', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('slug');

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

        Schema::dropIfExists('document_types');

    }
}
