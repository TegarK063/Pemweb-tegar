<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_dosen;

class c_dosen extends Controller
{
    protected $m_dosen;
    public function __construct()
    {
        $this->m_dosen = new m_dosen();
    }
    public function dosens()
    {
        $data = [
            'dosen' => $this->m_dosen->alldata(),
        ];
        return view('v_dosen', $data);
    }
    public function tampildosens()
    {
        $data = [
            'dosen' => $this->m_dosen->alldata(),
        ];
        return view('dosen.v_dosen', $data);
    }
    public function detail($id_dosen)
    {
        if (!$this->m_dosen->detailData($id_dosen)) {
            abort(404);
        }
        $data = ['dosen' => $this->m_dosen->detailData($id_dosen)];
        return view('v_detaildosen', $data);
    }
    public function tambah()
    {
        return view('v_tambah');
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'id_dosen' => 'required',
            'nip' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|image',
        ]);

        $file = $request->file('foto_dosen');
        $fileName = $request->nip . '.' . $file->extension();
        $file->move(public_path('assets/fotodosen'), $fileName);

        $this->m_dosen->store([
            // 'id_dosen' => $request->id_dosen,
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
            'foto_dosen' => $fileName,
        ]);
        return redirect('/dosen')->with('success', 'Data dosen berhasil ditambahkan!');
    }
    public function edit($id_dosen)
    {
        $dosen = $this->m_dosen->detailData($id_dosen);
        abort_if(!$dosen, 404);
        return view('v_editdosen', ['dosen' => $dosen]);
    }
    public function update($id_dosen)
    {
        Request()->validate([
            // 'id_dosen' => 'required',
            'nip' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'nullable|image',
        ], [
            // 'id_dosen' => 'required',
            'nip' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|image',
        ]);
        if (Request()->foto_dosen <> '') {
            $file = Request()->foto_dosen;
            $fileName = Request()->id_dosen . '.' . $file->extension();
            $file->move(public_path('assets/fotodosen'), $fileName);

            $data = [
                'id_dosen' => Request()->id_dosen,
                'nip' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'mata_kuliah' => Request()->mata_kuliah,
                'foto_dosen' => $fileName,
            ];
            $this->m_dosen->editData($id_dosen, $data);
        } else {
            $data = [
                'id_dosen' => Request()->id_dosen,
                'nip' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'mata_kuliah' => Request()->mata_kuliah,
            ];
            $this->m_dosen->editData($id_dosen, $data);
        }
        return redirect('/dosen')->with('success', 'Data dosen berhasil diUpdate!');
    }
    public function hapus($id_dosen)
    {
        $this->m_dosen->hapusData($id_dosen);
        return redirect('/dosen')->with('success', 'Data dosen berhasil diHapus!');
    }
    function tampildashboard () {
        return view('dosen.v_dashboard');
    }
}
