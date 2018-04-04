<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_answers', function (Blueprint $table) {
            $table->integer('country_id')->unsigned()->nullable();
             $table->foreign('country_id')->references('id')
                   ->on('countries')->onDelete('cascade');

             $table->integer('answer_id')->unsigned()->nullable();
             $table->foreign('answer_id')->references('id')
                   ->on('answers')->onDelete('cascade');

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
        Schema::dropIfExists('countries_answers');
    }
}
