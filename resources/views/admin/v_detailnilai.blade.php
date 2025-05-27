@extends('layout.v_tamplate')

@section('content')
    <style>
        .custom-card-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem 2rem;
            padding: 20px;
            background-color: #f8f9fc;
            border-radius: 8px;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            font-size: 16px;
        }

        .form-group label {
            width: 180px;
            font-weight: bold;
            margin-bottom: 0;
            color: #4e73df;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 20px;
            /* background-color: #f1f1f1; */
            border-top: 1px solid #e3e6f0;
            border-radius: 0 0 8px 8px;
        }

        .btn {
            min-width: 140px;
            font-weight: bold;
        }
    </style>

    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Title : HOME</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="card card-primary">
            <!-- Form start -->
            <form>
                <div class="custom-card-body">
                    <div class="form-group">
                        <label>Dosen :</label>
                        <div>{{ $nilai->dosen->nama_dosen }}</div>
                    </div>
                    <div class="form-group">
                        <label>Matakuliah :</label>
                        <div>{{ $nilai->matakuliah->nama_matakuliah }}</div>
                    </div>
                    <div class="form-group">
                        <label>Kelas :</label>
                        <div>{{ $nilai->matakuliah->kelas->nama_kelas ?? 'Tidak ada kelas' }}</div>
                    </div>
                    <div class="form-group">
                        <label>Semester :</label>
                        <div>{{ $nilai->semester->semester }}</div>
                    </div>
                    <div class="form-group">
                        <label>Jurusan :</label>
                        <div>{{ $nilai->jurusan->nama_jurusan }}</div>
                    </div>
                    <div class="form-group">
                        <label>Prodi :</label>
                        <div>{{ $nilai->prodi->nama_prodi }}</div>
                    </div>
                    <div class="form-group">
                        <label>Komposisi Nilai Lain :</label>
                        <div>{{ $nilai->komposisi_nilai_lain }}</div>
                    </div>
                    <div class="form-group">
                        <label>Komposisi Nilai UTS :</label>
                        <div>{{ $nilai->komposisi_nilai_uts }}</div>
                    </div>
                    <div class="form-group">
                        <label>Komposisi Nilai UAS :</label>
                        <div>{{ $nilai->komposisi_nilai_uas }}</div>
                    </div>
                </div>

                <!-- Card footer -->
                <div class="card-footer">
                    <a href="{{ route('admin.tambahdetailnilai', ['id_nilai' => $nilai->id_nilai]) }}" class="btn btn-primary ">Tambah Detail Nilai</a>
                </div>
            </form>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Detail Nilai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai Lain-lain</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UTS</th>
                            <th>Nilai Akhir</th>
                            <th>GRADE</th>
                            <th>STATUS</th>
                            <th>KETERANGAN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($detailnilai as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->mahasiswa->nim }}</td>
                                <td>{{ $data->nama_mahasiswa }}</td>
                                <td>{{ $data->lain_lain }}</td>
                                <td>{{ $data->uts }}</td>
                                <td>{{ $data->uas }}</td>
                                <td>{{ $data->nilai_akhir }}</td>
                                <td>{{ $data->grade }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->keterangan }}</td>
                                {{-- <td>{{ $data->nilai->id_nilai }}</td> --}}
                                <td>
                                    <a href="{{ url('/admin/editdetailnilai/' . $data->id_detail_nilai) }}"
                                        class="btn btn-warning">Edit</a>
                                    <!-- Trigger Modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusModal{{ $data->id_detail_nilai }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="hapusModal{{ $data->id_detail_nilai }}" tabindex="-1" role="dialog"
                                aria-labelledby="hapusModalLabel{{ $data->id_detail_nilai }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="hapusModalLabel{{ $data->id_detail_nilai }}">Konfirmasi
                                                Hapus
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <a href="{{ url('/admin/hapusdetailnilai/' . $data->id_detail_nilai) }}"
                                                class="btn btn-danger">Ya,
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
        <div class=" footer p-3">
            <a href="/admin/nilai"><button type="button" class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
@endsection
