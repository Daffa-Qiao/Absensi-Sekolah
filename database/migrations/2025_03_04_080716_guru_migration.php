<?php

use Illuminate\Database\Eloquent\Scope;
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
        Schema::create('guru',function(Blueprint $table){
            $table->id('kode_guru');
            $table->string('nama','100');
            $table->string('nip','19');
            $table->string('mapel');
            $table->enum('role',['Guru','Walikelas','Piket','BK'])->default('Guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('guru');
    }
};
