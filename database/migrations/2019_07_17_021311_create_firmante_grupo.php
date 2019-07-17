<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmanteGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmante_grupo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('firmante_id');
            $table->unsignedInteger('grupo_id');

            $table->foreign('firmante_id')->references('id')->on('firmantes');
            $table->foreign('grupo_id')->references('id')->on('grupos');
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
        Schema::dropIfExists('firmante_grupo');
    }
}
