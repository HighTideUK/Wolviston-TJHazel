<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('people_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
        });

        Schema::table('people', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('people_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('people_categories');
        
    }
}
