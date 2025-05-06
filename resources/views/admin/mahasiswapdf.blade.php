<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Mahasiswa PDF</title>
    <link href="{{ asset('assets/tamplate/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tamplate/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<style>
    table.bebas {
        position: relative;
        width: 95%;
        text-align: center
    }

    .header-table {
        padding: 0 0 15px 2.3rem;
    }

    .header p.txt {
        text-align: center
    }

    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<body>
    <div class="form-group">
        <div class="header">
            <p class="txt"><b>DATA MAHASISWA</b></p>
        </div>
        <div class="container-table">
            <div class="header-table">
                <button class="no-print" class="btn btn-secondary" onclick="window.history.back();">Kembali</button>
            </div>
            <table class="bebas table-bordered" align="center">
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
</body>
<script>
    window.onload = function() {
        window.print();
    }
</script>

</html>
