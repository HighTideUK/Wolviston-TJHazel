<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleCasestudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('people_casestudies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casestudy_id')->unsigned()->nullable();
            $table->foreign('casestudy_id')->references('id')->on('casestudies');
            $table->integer('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('people');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_casestudies');
    }
}
