<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('casestudies', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('publish')->default(true);
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('description');
            $table->string('feature_image')->nullable();
            $table->string('listing_image')->nullable();
            $table->timestamps();
        });

        Schema::create('casestudy_expertise', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casestudy_id')->unsigned()->nullable();
            $table->foreign('casestudy_id')->references('id')->on('casestudies');
            $table->integer('expertise_id')->unsigned()->nullable();
            $table->foreign('expertise_id')->references('id')->on('expertise');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casestudy_expertise');
        Schema::dropIfExists('casestudies');
    }
}
