<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correlativo');
            $table->dateTime('hora_inicio')->nullable();
            $table->dateTime('hora_fin')->nullable();
            $table->date('dia_inicio')->nullable();
            $table->date('dia_fin')->nullable();
            $table->text('descripcion');
            $table->string('estado')->default('pendiente');
            $table->boolean('viatico')->dafault(0);
            $table->string('movilizacion')->nullable();
            $table->string('lugar')->nullable();
            $table->string('tipo');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
