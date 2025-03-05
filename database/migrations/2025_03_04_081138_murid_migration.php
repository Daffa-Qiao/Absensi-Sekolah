<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('murid', function (Blueprint $table) {
            $table->id('nis')->autoIncrement(false)->primary();
            $table->string('kelas','30');
            $table->bigInteger('walikelas')->autoIncrement(false)->unsigned(true);
            $table->bigInteger('jabatan')->autoIncrement(false)->unsigned(true);
            $table->string('username','16');
            $table->string('password','32');
            $table->string('email')->unique('email');
            $table->string('no_hp','15');
            $table->string('foto');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('jurusan','200');
            $table->enum('status',['Baik','Peringatan 1','Peringatan 2','Peringatan 3','Dikeluarkan'])->default('Baik');
            $table->string('token');
            $table->enum('is_verifikasi',['no','pending','yes'])->default('no');
            $table->timestamps();
            $table->foreign('kelas')->references('kode_kelas')->on('kelas');
            $table->foreign('jabatan')->references('id_pengurus_kelas')->on('pengurus_kelas');
            $table->foreign('walikelas')->references('id_walikelas')->on('walikelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('murid');
    }
};
