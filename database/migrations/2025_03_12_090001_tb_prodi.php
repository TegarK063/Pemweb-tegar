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
        Schema::create('tb_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi', 100);
            $table->string('jenjang', 10);
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->timestamps();

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
