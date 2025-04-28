<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Request;

class m_dosen extends Model
{
    // use HasFactory;
    protected $table = 'tb_dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['nip', 'nama_dosen', 'id_matakuliah', 'foto_dosen', 'id_jurusan', 'id_prodi'];
    public $timestamps = false; // Disable timestamps

    public function jurusan () {
        return $this->belongsTo(m_jurusan::class, 'id_jurusan');
    }
    public function prodi () {
        return $this->belongsTo(m_prodi::class, 'id_prodi');
    }
    public function matakuliah () {
        return $this->belongsTo(m_matakuliah::class, 'id_matakuliah', 'id_matakuliah');
    }

    public function alldata()
    {
        return DB::table("tb_dosen")->get();
    }
    public function detailData($id_dosen) {
        return DB::table("tb_dosen")->where("id_dosen", $id_dosen)->first();
    }
    public function store($data)
    {
        DB::table('tb_dosen')->insert($data);
    }
    public function editData($id_dosen, $data)
    {
        DB::table('tb_dosen')->where('id_dosen', $id_dosen)->update($data);
    }
    public function hapusData($id_dosen) {
        DB::table('tb_dosen')->where('id_dosen',$id_dosen)->delete();
        return redirect('dosen');
    }
}
