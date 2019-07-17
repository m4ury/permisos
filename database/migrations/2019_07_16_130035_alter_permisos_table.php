<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->renameColumn('lugar', 'comuna');
            $table->renameColumn('viatico', 'incluye_viatico');
            $table->string('organizador')->after('descripcion')->nullable();
            //$table->string('lugar')->after('movilizacion')->nullable();
            $table->enum('doc_informacion',['correo','telefono','web'])->after('lugar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            //
        });
    }
}
