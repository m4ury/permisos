<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPernoctacionToViaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viaticos', function (Blueprint $table) {
            $table->tinyInteger('pernoctacion')->after('observacion')->default(0);
            $table->renameColumn('valor', 'valor_parcial');
            $table->decimal('valor_completo')->after('pernoctacion')->default(46782);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viaticos', function (Blueprint $table) {
            //
        });
    }
}
