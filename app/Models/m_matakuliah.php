<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_matakuliah extends Model
{
    protected $table = 'tb_mata_kuliah';
    protected $primaryKey = 'id_matakuliah';
    protected $fillable = ['kode_matakuliah', 'nama_matakuliah', 'sks', 'semester', 'id_prodi'];
    public $timestamps = false; // Disable timestamps

    // satu mata kuliah milik satu prodi
    public function prodi()
    {
        return $this->belongsTo(m_prodi::class, 'id_prodi');
    }
    // satu mata kuliah punya banyak dosen
    // public function dosen()
    // {
    //     return $this->hasMany(m_dosen::class, 'id_matakuliah', 'id_matakuliah');
    // }
    // satu mata kuliah punya banyak kelas
    public function kelas()
    {
        return $this->hasMany(m_kelas::class, 'id_kelas', 'id_kelas');
    }
    // satu mata kuliah punya banyak semester
    public function semester()
    {
        return $this->belongsTo(m_semester::class, 'id_semester', 'id_semester');
    }
    public function nilai() {
        return $this->belongsTo(m_nilai::class, 'id_matakuliah', 'id_matakuliah');
    }
}
