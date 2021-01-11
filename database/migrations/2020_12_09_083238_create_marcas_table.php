<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_marca')->nullable();
            $table->time('hora_marca')->nullable();
            $table->unsignedInteger('tipo_marca')->nullable();
            $table->integer('codigo_user')->nullable();
            $table->timestamps();
        });

        Schema::table('marcas', function (Blueprint $table) {
            $table->foreign('codigo_user')->references('codigo')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
