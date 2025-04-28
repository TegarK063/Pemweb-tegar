@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Title : Dosen</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <h4>Ini adalah halaman Dosen</h4>
                <div>
                    {{-- {{ dd($dosen) }} --}}
                    {{-- @foreach ($dosen as $data) --}}
                    {{-- <p>NIP : {{ $data['NIP'] }}</p>
                        <p>Nama : {{ $data['Nama_Dosen'] }}</p>
                        <p>Nama : {{ $data['Mata_Kuliah'] }}</p>
                        <hr> --}}
                </div>
                <!-- /.container-fluid -->
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Foto Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($dosen as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->nama_dosen }}</td>
                                <td>{{ $data->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $data->jurusan->nama_jurusan }}</td>
                                <td>{{ $data->prodi->nama_prodi }}</td>
                                <td><img src="{{ url('assets/fotodosen/' . $data->foto_dosen) }}" alt=""
                                        width="100px"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
