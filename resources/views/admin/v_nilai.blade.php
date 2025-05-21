@extends('layout.v_tamplate')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="nav-content d-flex justify-content-end">
                <a href="{{ route('admin.tambahnilai') }}" class="btn btn-primary ">Tambah data</a>
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
                            <th>Tahun Akademik</th>
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
                                <td>{{ $data->tahunakademi->tahun_akademi }}</td>
                                <td>{{ $data->jurusan->nama_jurusan }}</td>
                                <td>{{ $data->prodi->nama_prodi }}</td>
                                <td>{{ $data->komposisi_nilai_lain }}</td>
                                <td>{{ $data->komposisi_nilai_uts }}</td>
                                <td>{{ $data->komposisi_nilai_uas }}</td>
                                <td>
                                    <a href="{{ url('/admin/detailnilai/' . $data->id_nilai) }}"
                                        class="btn btn-success">Rincian Detail Nilai</a>
                                    <a href="{{ url('/admin/editnilai/' . $data->id_nilai) }}"
                                        class="btn btn-warning">Edit</a>
                                    <!-- Trigger Modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusModal{{ $data->id_nilai }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="hapusModal{{ $data->id_nilai }}" tabindex="-1" role="dialog"
                                aria-labelledby="hapusModalLabel{{ $data->id_nilai }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="hapusModalLabel{{ $data->id_nilai }}">Konfirmasi Hapus
                                        </h5>
                                        <button type="button" class="close text-white" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data nilai ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="{{ url('/admin/hapusnilai/' . $data->id_nilai) }}" class="btn btn-danger">Ya,
                                        Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
