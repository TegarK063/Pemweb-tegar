<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Mahasiswa PDF</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .header p {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        img {
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>

    <div class="header">
        <p>DATA MAHASISWA</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Tingkat</th>
                <th>Semester</th>
                <th>No HP</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
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
                    <td>{{ $data->jurusan->nama_jurusan ?? '-' }}</td>
                    <td>{{ $data->prodi->nama_prodi ?? '-' }}</td>
                    <td>{{ $data->ttl }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->agama }}</td>
                    <td>{{ $data->tingkat }}</td>
                    <td>{{ $data->semester }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>
                        @php
                            $imgPath = public_path('assets/fotomahasiswa/' . $data->foto_m);
                        @endphp
                        @if(file_exists($imgPath))
                            <img src="{{ $imgPath }}" width="60" height="60">
                        @else
                            Tidak Ada Foto
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
