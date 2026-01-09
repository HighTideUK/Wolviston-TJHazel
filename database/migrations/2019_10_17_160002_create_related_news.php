<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->nullable();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('related_news_id')->unsigned()->nullable();
            $table->foreign('related_news_id')->references('id')->on('news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_news');
    }
}
