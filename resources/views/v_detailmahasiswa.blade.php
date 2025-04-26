@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Mahasiswa</h1>
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
                        <label for="exampleInputEmail1">NIM :</label>
                        {{ $mahasiswa->nim }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Mahasiswa :</label>
                        {{ $mahasiswa->nama }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Jurusan :</label>
                        {{ $mahasiswa->jurusan->nama_jurusan }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Prodi :</label>
                        {{ $mahasiswa->prodi }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">TTL :</label>
                        {{ $mahasiswa->ttl }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Alamat :</label>
                        {{ $mahasiswa->alamat }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Agama :</label>
                        {{ $mahasiswa->agama }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Tingkat :</label>
                        {{ $mahasiswa->tingkat }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Semester :</label>
                        {{ $mahasiswa->semester}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">No Hp :</label>
                        {{ $mahasiswa->no_hp }}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto :</label><br>
                        <img src="{{ url('assets/fotodosen/' . $mahasiswa->foto_m) }}" alt="Foto Dosen" width="200px">
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer">
                    <a href="/mahasiswa"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
