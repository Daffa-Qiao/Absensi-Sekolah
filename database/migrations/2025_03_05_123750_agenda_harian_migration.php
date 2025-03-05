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
        Schema::create('agenda_harian',function(Blueprint $table){
            $table->id('id_agenda_harian');
            $table->bigInteger('guru','20')->autoIncrement(false)->unsigned(true);
            $table->bigInteger('absensi','20')->autoIncrement(false)->unsigned(true);
            $table->bigInteger('pengurus_kelas','20')->autoIncrement(false)->unsigned(true);
            $table->string('kelas','30');
            $table->date('tanggal');
            $table->string('mapel');
            $table->integer('jam_pelajaran',false,true);
            $table->string('materi');
            $table->foreign('guru')->references('kode_guru')->on('guru');
            $table->foreign('absensi')->references('id_status_absensi')->on('status_absensi');
            $table->foreign('pengurus_kelas')->references('id_pengurus_kelas')->on('pengurus_kelas');
            $table->foreign('kelas')->references('kode_kelas')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('agenda_harian');
    }
};
