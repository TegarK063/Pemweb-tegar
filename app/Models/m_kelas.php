<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_kelas extends Model
{
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_kelas', 'nama_kelas'];
    public $timestamps = false;

    public function mataKuliah()
    {
        return $this->hasMany(m_matakuliah::class, 'id_kelas', 'id_kelas');
    }
    public function mahasiswa() {
        return $this->hasMany(m_mahasiswa::class, 'id_kelas', 'id_kelas');
    }
}
