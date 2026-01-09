<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('publish')->default(true);
            $table->string('title');
            $table->text('summary')->nullable();
            $table->text('description');
            $table->string('feature_image')->nullable();
            $table->string('listing_image')->nullable();
            $table->timestamps();
        });

        Schema::create('news_article_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->nullable();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('news_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_article_categories');
        Schema::dropIfExists('news');
    }
}
