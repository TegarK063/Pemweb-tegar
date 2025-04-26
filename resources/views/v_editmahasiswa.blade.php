@extends('layout.v_tamplate')
@section('content')
    <h1>Edit Mahasiswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Mahasiswa</h3>
            </div>

            <!-- Form start -->
            <form action="/mahasiswa/update/{{ $mahasiswa->nim }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-box">
                        <label>NIM</label>
                        <input type="text" name="nim" value="{{ $mahasiswa->nim }}">
                    </div>
                    <div class="form-box">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ $mahasiswa->nama }}">
                    </div>
                    <div class="form-box">
                        <label for="">Jurusan</label>
                        <select name="jurusan" class="form-control">
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}"
                                    {{ $j->id == $mahasiswa->id_jurusan ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-box">
                        <label for="">Prodi</label>
                        <select name="prodi" class="form-control">
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}"
                                    {{ $p->id == $mahasiswa->id_prodi ? 'selected' : '' }}>
                                    {{ $p->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-box">
                        <label>Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" value="{{ $mahasiswa->ttl }}">
                    </div>
                    <div class="form-box">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="{{ $mahasiswa->alamat }}">
                    </div>
                    <div class="form-box">
                        <label>Agama</label>
                        <input type="text" name="agama" value="{{ $mahasiswa->agama }}">
                    </div>
                    <div class="form-box">
                        <label>Tingkat</label>
                        <input type="text" name="tingkat" value="{{ $mahasiswa->tingkat }}">
                    </div>
                    <div class="form-box">
                        <label>Semester</label>
                        <input type="text" name="semester" value="{{ $mahasiswa->semester }}">
                    </div>
                    <div class="form-box">
                        <label>No HP</label>
                        <input type="text" name="no_hp" value="{{ $mahasiswa->no_hp }}">
                    </div>
                    <div class="form-box">
                        <label>Foto Mahasiswa</label>
                        <input type="file" name="foto_m">
                        @if ($mahasiswa->foto_m)
                            <img src="{{ asset('assets/fotomahasiswa/' . $mahasiswa->foto_m) }}" width="100">
                        @endif
                    </div>
                    <input type="submit" value="Update Data" class="btn btn-primary">
                </div>
                <div class="card-footer">
                    <a href="/mahasiswa"><button type="button" class="btn btn-secondary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
