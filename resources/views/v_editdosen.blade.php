@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <div class="card shadow mb-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>

            <!-- Form start -->
            <form action="/dosen/update/{{ $dosen->id_dosen }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-box">
                        <label for="">NIP</label>
                        <input type="text" name="nip" value="{{ $dosen->nip }}">
                    </div>
                    <div class="form-box">
                        <label for="">Nama Dosen</label>
                        <input type="text" name="nama_dosen" value="{{ $dosen->nama_dosen }}">
                    </div>
                    <div class="form-box">
                        <label for="">Matakuliah</label>
                        <input type="text" name="mata_kuliah" value="{{ $dosen->mata_kuliah }}">
                    </div>
                    <div class="form-box">
                        <label>Foto Dosen</label>
                        <input type="file" name="foto_dosen">
                        @if ($dosen->foto_dosen)
                            <img src="{{ asset('assets/fotodosen/' . $dosen->foto_dosen) }}" width="100">
                        @endif
                    </div>
                    <input type="submit" value="Update Data" class="btn btn-primary">
                </div>
                <div class="card-footer">
                    <a href="/dosen"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
