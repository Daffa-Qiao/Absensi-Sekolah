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
        Schema::create('pengurus_kelas',function (Blueprint $table){
            $table->id('id_pengurus_kelas');
            $table->enum('jabatan',['Ketua','Wakil Ketua','Sekretaris','Bendahara','Siswa'])->default('Siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pengurus_kelas');
    }
};
