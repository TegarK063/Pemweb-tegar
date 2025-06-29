<?php

namespace App\Http\Controllers;

use App\Models\m_detailnilai;
use App\Models\m_mahasiswa;
use App\Models\m_nilai;
use Illuminate\Http\Request;

class c_rinciannilai extends Controller
{
    protected $m_detailnilai;

    public function __construct(m_detailnilai $m_detailnilai)
    {
        $this->m_detailnilai = $m_detailnilai;
    }
    public function getNamaMahasiswa($nim)
    {
        $mahasiswa = m_mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            return response()->json(['nama' => $mahasiswa->nama]);
        }

        return response()->json(['nama' => null]);
    }
    // Menampilkan semua detail nilai
    public function tampildetailnilai()
    {
        $detailnilai = $this->m_detailnilai->with('mahasiswa', 'nilai')->get(); // Eager loading relasi jurusan
        $nilai = \App\Models\m_nilai::with('jurusan', 'prodi', 'dosen', 'matakuliah', 'semester', 'tahunakademi')->first();
        return view('admin.v_detailnilai', compact('detailnilai', 'nilai'));
    }
    // Menampilkan form tambah nilai
    public function tambahdetailnilai($id_nilai)
    {
        $mahasiswa = m_mahasiswa::all();
        $nilai = m_nilai::with('jurusan', 'prodi', 'dosen', 'matakuliah', 'semester', 'tahunakademi')->findOrFail($id_nilai);
        return view('admin.v_tambahrinciannilai', compact('mahasiswa', 'nilai'));
    }
    // Menghitung nilai akhir, grade, dan status
    private function hitungNilai($lain_lain, $uts, $uas, $nilai)
    {
        $nilai_akhir = (($lain_lain * ($nilai->komposisi_nilai_lain / 100)) + ($uts * ($nilai->komposisi_nilai_uts / 100))+ ($uas * ($nilai->komposisi_nilai_uas / 100)));
        $grade = '';
        $status = '';

        if ($nilai_akhir >= 85) {
            $grade = 'A';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 78) {
            $grade = 'AB';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 70) {
            $grade = 'B';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 63) {
            $grade = 'BC';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 55) {
            $grade = 'C';
            $status = 'Tidak Lulus';
        } elseif ($nilai_akhir >= 40) {
            $grade = 'D';
            $status = 'Tidak Lulus';
        } else {
            $grade = 'E';
            $status = 'Tidak Lulus';
        }

        return [
            'nilai_akhir' => round($nilai_akhir, 2),
            'grade' => $grade,
            'status' => $status,
        ];
    }
    // Menambahkan detail nilai
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'lain_lain' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'keterangan' => 'required',
            'id_nilai' => 'required',
        ]);

        $nilai = m_nilai::findOrFail($request->id_nilai);
        // Hitung nilai akhir, grade, dan status
        $hasil = $this->hitungNilai($request->lain_lain, $request->uts, $request->uas, $nilai);

        $this->m_detailnilai->create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'lain_lain' => $request->lain_lain,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $hasil['nilai_akhir'],
            'grade' => $hasil['grade'],
            'status' => $hasil['status'],
            'keterangan' => $request->keterangan,
            'id_nilai' => $request->id_nilai,
        ]);

        return redirect()->route('admin.detailnilai', ['id_nilai' => $request->id_nilai])->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Menampilkan form edit nilai
    public function edit($id_detail_nilai)
    {
        $detailnilai = $this->m_detailnilai->with('mahasiswa', 'nilai')->find($id_detail_nilai);
        $mahasiswa = m_mahasiswa::all();
        $nilai = $detailnilai->nilai;
        if (!$detailnilai) {
            abort(404);
        }
        return view('admin.v_editddetailnilai', compact('mahasiswa', 'nilai', 'detailnilai'));
    }
    public function update(Request $request, $id_detail_nilai)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'lain_lain' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
            'keterangan' => 'required',
            'id_nilai' => 'required',
        ]);

        $detailnilai = $this->m_detailnilai->find($id_detail_nilai);

        $nilai = m_nilai::findOrFail($request->id_nilai);
        // Hitung nilai akhir, grade, dan status
        $hasil = $this->hitungNilai($request->lain_lain, $request->uts, $request->uas, $nilai);

        $detailnilai->update([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'lain_lain' => $request->lain_lain,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $hasil['nilai_akhir'],
            'grade' => $hasil['grade'],
            'status' => $hasil['status'],
            'keterangan' => $request->keterangan,
            'id_nilai' => $request->id_nilai,
        ]);

        return redirect()->route('admin.detailnilai', ['id_nilai' => $request->id_nilai])->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
    // Menghapus data detail nilai
    public function hapus($id_detail_nilai)
    {
        // Cari data detail nilai
        $nilai = $this->m_detailnilai->find($id_detail_nilai);

        if ($nilai) {
            // Simpan id_nilai sebelum hapus, supaya bisa dipakai redirect
            $id_nilai = $nilai->id_nilai;

            // Hapus data
            $nilai->delete();

            // Redirect ke route dengan parameter id_nilai, dan kirim flash message
            return redirect()->route('admin.detailnilai', ['id_nilai' => $id_nilai])
                ->with('success', 'Data mahasiswa berhasil dihapus!');
        } else {
            // Kalau tidak ditemukan, redirect juga dengan pesan error
            return redirect()->route('admin.detailnilai', ['id_nilai' => 0])
                ->with('error', 'Data mahasiswa tidak ditemukan!');
        }
    }
}
