<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion_acuerdo')->nullable();
            $table->boolean('estado_acuerdo');
            $table->date('expiracion_acuerdo')->nullable();
            $table->timestamps();

            $table->integer('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('reunion_id')->nullable();

        });

        Schema::table('acuerdos', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('reunion_id')->references('id')->on('reunions')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acuerdos');
    }
}
