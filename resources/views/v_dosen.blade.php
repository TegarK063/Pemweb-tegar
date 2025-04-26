@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="nav-content d-flex justify-content-end">
                    <a href="{{ url('/dosen/tambah') }}" class="btn btn-primary ">Tambah data</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Foto Dosen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($dosen as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->nama_dosen }}</td>
                                <td>{{ $data->mata_kuliah }}</td>
                                <td><img src="{{ url('assets/fotodosen/' . $data->foto_dosen) }}" alt=""
                                        width="100px"></td>
                                <td>
                                    <a href="{{ url('/dosen/detail/' . $data->id_dosen) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ url('/dosen/edit/' . $data->id_dosen) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/dosen/hapus/' . $data->id_dosen) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
