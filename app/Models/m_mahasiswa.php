<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Request;

class m_mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'id_jurusan', 'id_prodi', 'ttl', 'alamat','agama', 'tingkat', 'semester', 'no_hp', 'foto_m'];
    public $timestamps = false; // Disable timestamps
    
    public function jurusan () {
        return $this->belongsTo(m_jurusan::class, 'id_jurusan');
    }
    public function prodi () {
        return $this->belongsTo(m_prodi::class, 'id_prodi');
    }

    public function alldata()
    {
        return DB::table("tb_mahasiswa")->get();
    }
    public function detailData($nim) {
        return DB::table("tb_mahasiswa")->where("nim", $nim)->first();
    }
    public function store($data)
    {
        DB::table('tb_mahasiswa')->insert($data);
    }
    public function editData($nim, $data)
    {
        DB::table('tb_mahasiswa')->where('nim', $nim)->update($data);
    }
    public function hapusData($nim) {
        DB::table('tb_mahasiswa')->where('nim',$nim)->delete();
        return redirect('mahasiswa');
    }
}
