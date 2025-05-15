@extends('layout.v_tamplate')
@section('content')
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
                        <label for="exampleInputEmail1">Dosen :</label>
                        {{ $nilai->dosen->nama_dosen }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Matakuliah :</label>
                        {{ $nilai->matakuliah->nama_matakuliah }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Semester :</label>
                        {{ $nilai->semester->semester }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Jurusan :</label>
                        {{ $nilai->jurusan->nama_jurusan }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Prodi :</label>
                        {{ $nilai->prodi->nama_prodi }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">komposisi_nilai_lain :</label>
                        {{ $nilai->komposisi_nilai_lain }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">komposisi_nilai_uts :</label>
                        {{ $nilai->komposisi_nilai_uts }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">komposisi_nilai_uas :</label>
                        {{ $nilai->komposisi_nilai_uas }}
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer">
                    <a href="/admin/nilai"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
