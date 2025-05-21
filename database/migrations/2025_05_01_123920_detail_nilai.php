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
        Schema::create('tb_detailNilai', function (Blueprint $table) {
            $table->id('id_detail_nilai');
            $table->string('nim')->nullable();
            $table->integer('lain_lain')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
            $table->decimal('nilai_akhir')->nullable();
            $table->string('grade')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_nilai')->nullable();

            $table->foreign('id_nilai')->references('id_nilai')->on('tb_nilai')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa')->onDelete('cascade');
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
