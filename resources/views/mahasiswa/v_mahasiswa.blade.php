@extends('layout.v_tamplate')
@section('content')
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
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Tempat tanggal lahir</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Tingkat</th>
                            <th>Semester</th>
                            <th>no hp</th>
                            <th>Foto Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($mahasiswa as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    @if ($data->jenis_kelamin == 'L')
                                        Laki-laki
                                    @elseif($data->jenis_kelamin == 'P')
                                        Perempuan
                                    @else
                                        Tidak Diketahui
                                    @endif
                                </td>
                                <td>{{ $data->jurusan->nama_jurusan }}</td>
                                <td>{{ $data->prodi->nama_prodi }}</td>
                                <td>{{ $data->ttl }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->agama }}</td>
                                <td>{{ $data->tingkat }}</td>
                                <td>{{ $data->semester }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td><img src="{{ url('assets/fotomahasiswa/' . $data->foto_m) }}" alt=""
                                        width="100px"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
