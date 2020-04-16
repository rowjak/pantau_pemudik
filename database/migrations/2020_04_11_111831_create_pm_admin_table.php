<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pm_admin', function (Blueprint $table) {
        //     $table->integer('kd_admin');
        //     $table->string('username')->unique();
        //     $table->unsignedInteger('kd_desa');
        //     // $table->foreign('kd_desa')->references('kd_desa')->on('pm_desa');
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();

        //     $table->primary('kd_admin');
        //     $table->index('kd_desa');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('pm_admin');
    }
}
