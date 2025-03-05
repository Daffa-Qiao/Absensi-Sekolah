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
        Schema::create('walikelas',function(Blueprint $table){
            $table->id('id_walikelas');
            $table->string('kelas','30');
            $table->bigInteger('guru','20')->autoIncrement(false)->unsigned(true);
            $table->string('nama','100');
            $table->foreign('kelas')->references('kode_kelas')->on('kelas');
            $table->foreign('guru')->references('kode_guru')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('walikelas');
    }
};
