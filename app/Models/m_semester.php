<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_semester extends Model
{
    protected $table = 'tb_semester';
    protected $primaryKey = 'id_semester';
    protected $fillable = [ 'id_semester' ,'semester'];
    public $timestamps = false;

    // satu semester punya banyak mata kuliah
    public function mataKuliah()
    {
        return $this->hasMany(m_matakuliah::class, 'id_semester', 'id_semester');
    }
}
