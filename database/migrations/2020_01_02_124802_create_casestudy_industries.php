<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasestudyIndustries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casestudy_industries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casestudy_id')->unsigned()->nullable();
            $table->foreign('casestudy_id')->references('id')->on('casestudies');
            $table->integer('industry_id')->unsigned()->nullable();
            $table->foreign('industry_id')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casestudy_industries');
    }
}
