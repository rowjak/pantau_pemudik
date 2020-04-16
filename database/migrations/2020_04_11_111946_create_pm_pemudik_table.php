<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmPemudikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pm_pemudik', function (Blueprint $table) {
        //     $table->integer('kd_pemudik');
        //     $table->string('no_hp')->unique();
        //     $table->string('nik',20);
        //     $table->string('nama',255);
        //     $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
        //     $table->integer('usia');
        //     $table->enum('hub_kekerabatan',['Orangtua','Suami','Istri','Anak','Mertua','Saudara Kandung','Saudara Ipar','Teman','Tetangga']);
        //     $table->enum('pekerjaan',['Pelajar/Mahasiswa','PNS','Buruh','Wiraswasta','Tidak Bekerja','Lainnya']);
        //     $table->string('alamat',255);
        //     $table->unsignedInteger('kd_desa');
        //     $table->foreign('kd_desa')->references('kd_desa')->on('pm_desa');
        //     $table->rememberToken();
        //     $table->timestamps();

        //     $table->primary('kd_pemudik');
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
        // Schema::table('pm_pemudik',function(Blueprint $table){
        //     $table->dropForeign(['kd_desa']);
        // });
        // Schema::dropIfExists('pm_pemudik');
    }
}
