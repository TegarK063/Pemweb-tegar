<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_tahunakademi extends Model
{
    protected $table = 'tb_tahunakademi';
    protected $primaryKey = 'id_tahunakademi';
    protected $fillable = [ 'id_tahunakademi' ,'tahun_akademi'];
    public $timestamps = false;

    public function nilai() {
        return $this->hasMany(m_nilai::class, 'id_tahunakademi', 'id_tahunakademi');
    }
}
