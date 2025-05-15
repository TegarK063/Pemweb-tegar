<?php

namespace App\Http\Controllers;

use App\Models\m_dosen;
use App\Models\m_jurusan;
use App\Models\m_matakuliah;
use App\Models\m_nilai;
use App\Models\m_prodi;
use App\Models\m_semester;
use App\Models\m_tahunakademi;
use Illuminate\Http\Request;

class c_nilai extends Controller
{
    protected $m_nilai;

    public function __construct(m_nilai $m_nilai)
    {
        $this->m_nilai = $m_nilai;
    }
    // Menampilkan semua nilai
    public function tampilnilai()
    {
        $nilai = $this->m_nilai->with('jurusan', 'prodi', 'dosen', 'matakuliah', 'semester', 'tahunakademi')->get(); // Eager loading relasi jurusan
        return view('admin.v_nilai', compact('nilai'));
    }
    // Menampilkan form tambah nilai
    public function tambahnilai()
    {
        $jurusan = m_jurusan::all(); // Mengambil semua data jurusan
        $prodi = m_prodi::all();
        $semester = m_semester::all();
        $tahunakademi = m_tahunakademi::all();
        $matakuliah = m_matakuliah::all();
        $dosen = m_dosen::all();
        return view('admin.v_tambahnilai', compact('jurusan', 'prodi', 'dosen', 'matakuliah', 'semester', 'tahunakademi'));
    }
    // Menambahkan nilai
    public function store(Request $request)
    {
        $request->validate([
            'dosen' => 'required|required',
            'matakuliah' => 'required',
            'semester' => 'required',
            'tahunakademi' => 'required',
            'prodi' => 'required',
            'jurusan' => 'required',
            'komposisi_nilai_lain' => 'required',
            'komposisi_nilai_uts' => 'required',
            'komposisi_nilai_uas' => 'required',
        ]);

        $this->m_nilai->create([
            'id_dosen' => $request->dosen,
            'id_matakuliah' => $request->matakuliah,
            'id_semester' => $request->semester,
            'id_tahunakademi' => $request->tahunakademi,
            'id_prodi' => $request->prodi,
            'id_jurusan' => $request->jurusan,
            'komposisi_nilai_lain' => $request->komposisi_nilai_lain,
            'komposisi_nilai_uts' => $request->komposisi_nilai_uts,
            'komposisi_nilai_uas' => $request->komposisi_nilai_uas,
        ]);

        return redirect('/admin/nilai')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
    // Menampilkan detail nilai
    public function detailnilai($id_nilai)
    {
        $nilai = $this->m_nilai->with('jurusan', 'prodi', 'kelas')->find($id_nilai);
        if (!$nilai) {
            abort(404);
        }
        return view('v_detailnilai', compact('nilai'));
    }
}
