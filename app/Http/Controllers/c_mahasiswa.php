<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_mahasiswa;
use App\Models\m_jurusan;
use App\Models\m_kelas;
use App\Models\m_prodi;
use Barryvdh\DomPDF\Facade\Pdf;

class c_mahasiswa extends Controller
{
    protected $m_mahasiswa;

    public function __construct(m_mahasiswa $m_mahasiswa)
    {
        $this->m_mahasiswa = $m_mahasiswa;
    }

    // Menampilkan semua mahasiswa
    public function mahasiswas()
    {
        $mahasiswa = $this->m_mahasiswa->with('jurusan', 'prodi', 'kelas')->get(); // Eager loading relasi jurusan
        return view('v_mahasiswa', compact('mahasiswa'));
    }

    public function tampilmahasiswa()
    {
        $mahasiswa = $this->m_mahasiswa->with('jurusan', 'prodi', 'kelas')->get(); // Eager loading relasi jurusan
        return view('mahasiswa.v_mahasiswa', compact('mahasiswa'));
    }

    public function cetakpdf()
    {
        $mahasiswa = $this->m_mahasiswa->with('jurusan', 'prodi', 'kelas')->get(); // Eager loading relasi jurusan
        return view('admin.mahasiswapdf', compact('mahasiswa'));
    }

    // Menampilkan detail mahasiswa
    public function detail($nim)
    {
        $mahasiswa = $this->m_mahasiswa->with('jurusan', 'prodi', 'kelas')->find($nim);
        if (!$mahasiswa) {
            abort(404);
        }
        return view('v_detailmahasiswa', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function tambah()
    {
        $jurusan = m_jurusan::all(); // Mengambil semua data jurusan
        $kelas = m_kelas::all(); // Mengambil semua data kelas
        // $prodi = m_prodi::all(); // Mengambil semua data prodi
        return view('v_tambahmahasiswa', compact('jurusan', 'kelas'));
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:tb_mahasiswa',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'semester' => 'required',
            'no_hp' => 'required',
            'foto_m' => 'required|image',
        ]);

        $file = $request->file('foto_m');
        $fileName = $request->nim . '.' . $file->extension();
        $file->move(public_path('assets/fotomahasiswa'), $fileName);

        $this->m_mahasiswa->create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_jurusan' => $request->jurusan,
            'id_prodi' => $request->prodi,
            'id_kelas' => $request->kelas,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'tingkat' => $request->tingkat,
            'semester' => $request->semester,
            'no_hp' => $request->no_hp,
            'foto_m' => $fileName,
        ]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Menampilkan form edit mahasiswa
    public function edit($nim)
    {
        $mahasiswa = $this->m_mahasiswa->find($nim);
        $jurusan = m_jurusan::all(); // Mengambil semua data jurusan
        $kelas = m_kelas::all(); // Mengambil semua data jurusan
        // $prodi = m_prodi::all(); // Mengambil semua data prodi
        if (!$mahasiswa) {
            abort(404);
        }
        return view('v_editmahasiswa', compact('mahasiswa', 'jurusan', 'kelas'));
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'semester' => 'required',
            'no_hp' => 'required',
            'foto_m' => 'nullable|image',
        ]);

        $mahasiswa = $this->m_mahasiswa->find($nim);

        if ($request->hasFile('foto_m')) {
            $file = $request->file('foto_m');
            $fileName = $request->nim . '.' . $file->extension();
            $file->move(public_path('assets/fotomahasiswa'), $fileName);
            $mahasiswa->foto_m = $fileName;
        }

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_jurusan' => $request->jurusan,
            'id_prodi' => $request->prodi,
            'id_kelas' => $request->kelas,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'tingkat' => $request->tingkat,
            'semester' => $request->semester,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    // Menghapus data mahasiswa
    public function hapus($nim)
    {
        $this->m_mahasiswa->find($nim)->delete();
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
    function tampildashboard()
    {
        return view('mahasiswa.v_dashboard');
    }
    public function getProdi($id_jurusan)
    {
        $prodi = m_prodi::where('id_jurusan', $id_jurusan)->get();
        return response()->json($prodi);
    }
public function exportPdf()
{
    $mahasiswa = $this->m_mahasiswa->with(['jurusan', 'prodi', 'kelas'])->get();

    $pdf = Pdf::loadView('admin.mahasiswapdf', compact('mahasiswa'));
    return $pdf->stream('data_mahasiswa.pdf');
}
}
