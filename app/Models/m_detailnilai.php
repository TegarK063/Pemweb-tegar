<?php

namespace App\Models;

// use App\Http\Controllers\m_nilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_detailnilai extends Model
{
    protected $table = 'tb_detailNilai';
    protected $primaryKey = 'id_detail_nilai';
    protected $fillable = ['id_detail_nilai', 'nim', 'nama_mahasiswa', 'lain_lain', 'uts', 'uas', 'nilai_akhir', 'grade', 'status', 'keterangan', 'id_nilai'];
    public $timestamps = false; // Disable timestamps

    public function mahasiswa () {
        return $this->belongsTo(m_mahasiswa::class, 'nim', 'nim');
    }
    public function nilai () {
        return $this->belongsTo(m_nilai::class, 'id_nilai', 'id_nilai');
    }

    public function alldata()
    {
        return DB::table("tb_detailNilai")->get();
    }
    public function detailData($id_detail_nilai)
    {
        return DB::table("tb_detailNilai")->where("id_detail_nilai", $id_detail_nilai)->first();
    }
    public function store($data)
    {
        DB::table('tb_detailNilai')->insert($data);
    }
    public function editData($id_detail_nilai, $data)
    {
        DB::table('tb_detailNilai')->where('id_detail_nilai', $id_detail_nilai)->update($data);
    }
    public function hapusData($id_detail_nilai)
    {
        DB::table('tb_detailNilai')->where('id_detail_nilai', $id_detail_nilai)->delete();
        // return redirect('mahasiswa');
    }
}
