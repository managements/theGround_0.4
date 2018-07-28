<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug',30)->unique();
            $table->string('name',20)->unique();
            $table->string('licence',50)->unique();
            $table->string('brand');
            $table->string('address',50);
            $table->string('build',5);
            $table->string('floor',5);
            $table->string('apt_nbr',5);
            $table->string('zip',10);
            $table->string('email');
            $table->string('tel',10)->unique();
            $table->string('speaker',25);
            $table->string('range',5);
            $table->string('sold',5);
            $table->string('turnover',10);
            $table->dateTime('limit')->nullable();

            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('statutes');

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
        Schema::dropIfExists('companies');
    }
}
