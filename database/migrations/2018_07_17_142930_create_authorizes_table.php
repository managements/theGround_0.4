<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('authorize',50);
        });

        Schema::create('authorize_category', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('authorize_id')->unsigned()->index();
            $table->foreign('authorize_id')->references('id')->on('authorizes');

            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorizes');
        Schema::dropIfExists('authorize_category');
    }
}
