<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_dosen;
use App\Models\m_jurusan;
use App\Models\m_prodi;
use App\Models\m_matakuliah;

class c_dosen extends Controller
{
    protected $m_dosen;
    public function __construct()
    {
        $this->m_dosen = new m_dosen();
    }
    public function dosens()
    {
        $dosen = $this->m_dosen->with('jurusan', 'prodi')->get();
        return view('v_dosen', compact('dosen'));
    }
    public function tampildosens()
    {
        $dosen = $this->m_dosen->with('jurusan', 'prodi')->get();
        return view('dosen.v_dosen', compact('dosen'));
    }
    public function detail($id_dosen)
    {
        $dosen = $this->m_dosen->with( 'jurusan', 'prodi')->find($id_dosen);

        if (!$dosen) {
            abort(404);
        }

        $data = ['dosen' => $dosen];
        return view('v_detaildosen', $data);
    }

    public function tambah()
    {
        $jurusan = m_jurusan::all();
        // $mata_kuliah = m_matakuliah::all();
        return view('v_tambah', compact('jurusan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            // 'mata_kuliah' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'foto_dosen' => 'required|image',
        ]);

        $file = $request->file('foto_dosen');
        $fileName = $request->nip . '.' . $file->extension();
        $file->move(public_path('assets/fotodosen'), $fileName);

        m_dosen::create([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'bidang_keahlian' => $request->bidang_keahlian,
            // 'id_matakuliah' => $request->mata_kuliah,
            'id_jurusan' => $request->jurusan,
            'id_prodi' => $request->prodi,
            'foto_dosen' => $fileName,
        ]);

        return redirect('/dosen')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    public function edit($id_dosen)
    {
        $dosen = $this->m_dosen->detailData($id_dosen);
        $jurusan = m_jurusan::all();
        // $mata_kuliah = m_matakuliah::all();
        abort_if(!$dosen, 404);
        return view('v_editdosen', ['dosen' => $dosen], compact('jurusan'));
    }
    public function update(Request $request, $id_dosen)
    {
        $request->validate([
            'nip' => 'required',
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            // 'mata_kuliah' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'foto_dosen' => 'nullable|image',
        ]);

        $mahasiswa = $this->m_dosen->find($id_dosen);

        if ($request->hasFile('foto_dosen')) {
            $file = $request->file('foto_dosen');
            $fileName = $request->nip . '.' . $file->extension();
            $file->move(public_path('assets/fotodosen'), $fileName);
            $mahasiswa->foto_dosen = $fileName;
        }

        $mahasiswa->update([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'bidang_keahlian' => $request->bidang_keahlian,
            // 'id_matakuliah' => $request->mata_kuliah,
            'id_jurusan' => $request->jurusan,
            'id_prodi' => $request->prodi,
        ]);
        return redirect('/dosen')->with('success', 'Data dosen berhasil diUpdate!');
    }
    public function hapus($id_dosen)
    {
        $this->m_dosen->hapusData($id_dosen);
        return redirect('/dosen')->with('success', 'Data dosen berhasil diHapus!');
    }
    function tampildashboard()
    {
        return view('dosen.v_dashboard');
    }
    public function getProdi($id_jurusan)
    {
        $prodi = m_prodi::where('id_jurusan', $id_jurusan)->get();
        return response()->json($prodi);
    }
}
