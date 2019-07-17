<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToFirmantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firmantes', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('id');
//            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firmantes', function (Blueprint $table) {
            //
        });
    }
}
