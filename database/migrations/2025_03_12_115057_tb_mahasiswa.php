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
        // Menghapus tabel jika sudah ada sebelumnya
        Schema::dropIfExists('tb_mahasiswa');
        // if (!Schema::hasTable('tb_mahasiswa')) {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->integer('tingkat')->nullable();
            $table->integer('semester')->nullable();
            $table->text('no_hp')->nullable();
            $table->string('foto_m')->nullable();

            $table->foreign('id_jurusan')->references('id')->on('tb_jurusan')->onDelete('cascade');
        });
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
