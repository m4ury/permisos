<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelojsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relojs', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_problema');
            $table->boolean('entrada')->nullable();
            $table->boolean('salida')->nullable();
            $table->text('comentario_problema');
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('relojs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relojs');
    }
}
