<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Auth;


class CreateReunionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('inicio_reunion')->nullable();
            $table->time('fin_reunion')->nullable();
            $table->string('titulo_reunion')->nullable();
            $table->text('cuerpo_reunion')->nullable();
            $table->text('observaciones_reunion')->nullable();
            $table->string('creador_reunion')->default(Auth::user());
            $table->timestamps();

            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->bigInteger('acuerdo_id')->unsigned()->nullable();
        });

        Schema::table('reunions', function (Blueprint $table) {
            //$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('set null');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reunions');
    }
}
