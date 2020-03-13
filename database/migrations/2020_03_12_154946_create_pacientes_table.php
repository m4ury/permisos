<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paciente_rut')->unique();
            $table->string('paciente_nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('paciente_direccion')->nullable();
            $table->string('paciente_comuna')->nullable();
            $table->string('paciente_telefono')->nullable();
            $table->enum('paciente_sexo', ['Masculino', 'Femenino', 'Otro'])->nullable();
            $table->date('fecha_nacimiento');
            $table->timestamps();
            $table->unsignedBigInteger('tipo_id')->nullable();
        });

        Schema::table('pacientes', function (Blueprint $table) {
            $table->foreign('tipo_id')->references('id')->on('tipos')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
