@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Title : HOME</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>

            <!-- Form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP :</label>
                        {{ $dosen->nip }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Dosen :</label>
                        {{ $dosen->nama_dosen }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Mata Kuliah :</label>
                        {{ $dosen->matakuliah->nama_matakuliah }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Mata Kuliah :</label>
                        {{ $dosen->jurusan->nama_jurusan }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Mata Kuliah :</label>
                        {{ $dosen->prodi->nama_prodi }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto :</label><br>
                        <img src="{{ url('assets/fotodosen/' . $dosen->foto_dosen) }}" alt="Foto Dosen" width="200px">
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer">
                    <a href="/dosen"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
