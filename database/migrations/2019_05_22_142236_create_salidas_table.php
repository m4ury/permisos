<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
          $table->increments('id');
          $table->dateTime('hora_salida')->nullable();
          $table->dateTime('hora_llegada')->nullable();
          $table->date('dia_salida')->nullable();
          $table->text('descripcion');
          $table->string('estado')->default('pendiente');
          $table->string('tipo')->default('Salida');
          $table->timestamps();

          $table->integer('user_id')->unsigned();
      });
        Schema::table('salidas', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
