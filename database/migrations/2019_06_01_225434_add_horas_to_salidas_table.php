<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHorasToSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salidas', function (Blueprint $table) {
            $table->integer('horas_inicial')->default(120)->after('tipo');
            $table->integer('horas_ocupado')->nullable()->after('horas_inicial');
            $table->integer('horas_saldo')->nullable()->after('horas_ocupado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salidas', function (Blueprint $table) {
            //
        });
    }
}
