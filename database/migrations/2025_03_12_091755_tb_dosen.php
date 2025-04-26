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
                $table->string('mata_kuliah')->nullable();
                $table->string('foto_dosen')->nullable();
                $table->primary('id_dosen');
            });
        }
    }

    public function down(): void
    {
        //
    }
};
