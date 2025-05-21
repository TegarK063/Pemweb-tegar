<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Request;

class m_nilai extends Model
{
    protected $table = 'tb_nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['id_nilai', 'id_dosen', 'id_matakuliah', 'id_semester', 'id_tahunakademi', 'id_prodi', 'id_jurusan', 'komposisi_nilai_lain', 'komposisi_nilai_uts', 'komposisi_nilai_uas'];
    public $timestamps = false; // Disable timestamps
    
    public function jurusan () {
        return $this->belongsTo(m_jurusan::class, 'id_jurusan');
    }
    public function prodi () {
        return $this->belongsTo(m_prodi::class, 'id_prodi');
    }
    public function dosen () {
        return $this->belongsTo(m_dosen::class, 'id_dosen');
    }
    public function semester () {
        return $this->belongsTo(m_semester::class, 'id_semester');
    }
    public function matakuliah () {
        return $this->belongsTo(m_matakuliah::class, 'id_matakuliah');
    }
    public function tahunakademi () {
        return $this->belongsTo(m_tahunakademi::class, 'id_tahunakademi');
    }
    public function detailnilai () {
        return $this->hasMany(m_detailnilai::class, 'id_nilai');
    }
    public function alldata()
    {
        return DB::table("tb_nilai")->get();
    }
    public function detailData($id_nilai) {
        return DB::table("tb_nilai")->where("id_nilai", $id_nilai)->first();
    }
    public function store($data)
    {
        DB::table('tb_nilai')->insert($data);
    }
    public function editData($id_nilai, $data)
    {
        DB::table('tb_nilai')->where('id_nilai', $id_nilai)->update($data);
    }
    public function hapusData($id_nilai) {
        DB::table('tb_nilai')->where('id_nilai',$id_nilai)->delete();
        return redirect('mahasiswa');
    }
}
