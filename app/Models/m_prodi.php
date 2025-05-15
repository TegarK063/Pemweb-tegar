<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_prodi extends Model
{
    protected $table = 'tb_prodi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_prodi',
        'jenjang',
        'id_jurusan'
    ];

    public function jurusan()
    {
        return $this->belongsTo(m_jurusan::class, 'id_jurusan', 'id');
    }
    // satu prodi punya banyak mata kuliah
    public function matakuliah()
    {
        return $this->hasMany(m_matakuliah::class, 'id_prodi', 'id');
    }
    public function nilai() {
        return $this->hasMany(m_nilai::class, 'id_prodi', 'id');
    }
}
