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
        Schema::create('status_absensi',function(Blueprint $table){
            $table->id('id_status_absensi');
            $table->bigInteger('id_absensi','20')->autoIncrement(false)->unsigned(true);
            $table->foreign('id_absensi')->references('id_absensi')->on('absensi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('status_absensi');
    }
};
