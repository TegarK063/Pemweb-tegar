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
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->unsignedBigInteger('id_dosen')->nullable();
            $table->unsignedBigInteger('id_matakuliah')->nullable();
            $table->unsignedBigInteger('id_semester')->nullable();
            $table->unsignedBigInteger('id_tahunakademi')->nullable();
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->integer ('komposisi_nilai_lain')->nullable();
            $table->integer ('komposisi_nilai_uts')->nullable();
            $table->integer ('komposisi_nilai_uas')->nullable();
            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('tb_dosen')->onDelete('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('tb_mata_kuliah')->onDelete('cascade');
            $table->foreign('id_semester')->references('id_semester')->on('tb_semester')->onDelete('cascade');
            $table->foreign('id_tahunakademi')->references('id_tahunakademi')->on('tb_tahunakademi')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('tb_prodi')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id')->on('tb_jurusan')->onDelete('cascade');
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
