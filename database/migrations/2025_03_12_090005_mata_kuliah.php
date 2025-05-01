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
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_semester');
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->timestamps();
            $table->foreign('id_prodi')->references('id')->on('tb_prodi')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('tb_kelas')->onDelete('cascade');
            $table->foreign('id_semester')->references('id_semester')->on('tb_semester')->onDelete('cascade');
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
