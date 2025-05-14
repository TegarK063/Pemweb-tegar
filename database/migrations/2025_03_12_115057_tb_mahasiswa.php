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
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->integer('tingkat')->nullable();
            $table->integer('semester')->nullable();
            $table->text('no_hp')->nullable();
            $table->string('foto_m')->nullable();

            $table->foreign('id_jurusan')->references('id')->on('tb_jurusan')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('tb_prodi')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('tb_kelas')->onDelete('cascade');
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
