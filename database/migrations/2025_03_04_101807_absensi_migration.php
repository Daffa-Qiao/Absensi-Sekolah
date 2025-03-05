<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi',function(Blueprint $table){
            $table->id('id_absensi');
            $table->bigInteger('nis',false,true);
            $table->bigInteger('pengurus_kelas','20')->autoIncrement(false)->unsigned(true)->nullable(true);
            $table->bigInteger('guru_piket','20')->autoIncrement(false)->unsigned(true)->nullable(true);
            $table->string('jam_absen','30');
            $table->date('tanggal_absen');
            $table->string('foto_absen');
            $table->string('status','25');
            $table->string('lokasi','50')->nullable(true);
            $table->text('keterangan')->nullable(true);
            $table->foreign('nis')->references('nis')->on('murid');
            $table->foreign('pengurus_kelas')->references('id_pengurus_kelas')->on('pengurus_kelas');
            $table->foreign('guru_piket')->references('kode_guru')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('absensi');
    }
};
