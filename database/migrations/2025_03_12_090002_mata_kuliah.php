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
        Schema::create('tb_mata_kuliah', function (Blueprint $table) {
            $table->id('id_matakuliah');
            $table->string('kode_matakuliah')->unique();
            $table->string('nama_matakuliah');
            $table->integer('sks');
            $table->integer('semester');
            $table->string('kelas');
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->timestamps();
            $table->foreign('id_prodi')->references('id')->on('tb_prodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
