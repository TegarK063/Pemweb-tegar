<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Request;

class m_dosen extends Model
{
    // use HasFactory;
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
