@extends('layout.v_tamplate')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="nav-content d-flex justify-content-end">
                <a href="{{ route ('admin.tambahnilai') }}" class="btn btn-primary ">Tambah data</a>
                <a href="" class="btn btn-danger">Export PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Nilai</th>
                            <th>Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Jurusan</th>
                            <th>Komposisi Nilai Lain-Lain</th>
                            <th>Komposisi Nilai UTS</th>
                            <th>Komposisi Nilai UTS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->dosen->nama_dosen }}</td>
                                <td>{{ $data->matakuliah->nama_matakuliah }}</td>
                                <td>{{ $data->semester->semester }}</td>
                                <td>{{ $data->jurusan->nama_jurusan }}</td>
                                <td>{{ $data->prodi->nama_prodi }}</td>
                                <td>{{ $data->komposisi_nilai_lain }}</td>
                                <td>{{ $data->komposisi_nilai_uts }}</td>
                                <td>{{ $data->komposisi_nilai_uas }}</td>
                                <td>
                                    <a href="{{ url('/admin/detailnilai/' . $data->id_nilai) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ url('/mahasiswa/edit/' . $data->nim) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/mahasiswa/hapus/' . $data->nim) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
