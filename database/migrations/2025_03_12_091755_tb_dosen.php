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
        if (!Schema::hasTable('tb_dosen')) {
            Schema::create('tb_dosen', function (Blueprint $table) {
                $table->id('id_dosen');
                $table->string('nip')->nullable();
                $table->string('nama_dosen')->nullable();
                $table->string('bidang_keahlian')->nullable();
                // $table->unsignedBigInteger('id_matakuliah')->nullable();
                $table->string('foto_dosen')->nullable();
                $table->primary('id_dosen');
                $table->unsignedBigInteger('id_jurusan')->nullable();
                $table->unsignedBigInteger('id_prodi')->nullable();

                $table->foreign('id_jurusan')->references('id')->on('tb_jurusan')->onDelete('cascade');
                $table->foreign('id_prodi')->references('id')->on('tb_prodi')->onDelete('cascade');
                // $table->foreign('id_matakuliah')->references('id_matakuliah')->on('tb_mata_kuliah')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        //
    }
};
