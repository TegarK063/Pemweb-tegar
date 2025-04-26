<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_jurusan extends Model
{
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_jurusan'];

    public function mahasiswa() {
        return $this->hasMany(m_mahasiswa::class, 'id_jurusan');
    }
    public function prodi() {
        return $this->hasMany(m_prodi::class, 'id_jurusan');
    }
}
