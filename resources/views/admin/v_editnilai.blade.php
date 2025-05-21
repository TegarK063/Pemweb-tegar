@extends('layout.v_tamplate')
@section('content')
    <h1>Edit Mahasiswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Nilai</h3>
            </div>

            <!-- Form start -->
            <form action="/admin/update/{{ $nilai->id_nilai }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="item-list mb-3">
                        <label>Dosen</label>
                        <select name="dosen" class="form-control" required>
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->id_dosen }}"
                                    {{ old('dosen', $nilai->id_dosen ?? '') == $d->id_dosen ? 'selected' : '' }}>
                                    {{ $d->nama_dosen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Matakuliah</label>
                        <select name="matakuliah" class="form-control" required>
                            <option value="">-- Pilih Matakuliah --</option>
                            @foreach ($matakuliah as $mk)
                                <option value="{{ $mk->id_matakuliah }}"
                                    {{ old('matakuliah', $nilai->id_matakuliah ?? '') == $mk->id_matakuliah ? 'selected' : '' }}>
                                    {{ $mk->nama_matakuliah }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Semester</label>
                        <select name="semester" class="form-control" required>
                            <option value="">-- Pilih Semester --</option>
                            @foreach ($semester as $smt)
                                <option value="{{ $smt->id_semester }}"
                                    {{ old('semester', $nilai->id_semester ?? '') == $smt->id_semester ? 'selected' : '' }}>
                                    {{ $smt->semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Tahunakademi</label>
                        <select name="tahunakademi" class="form-control" required>
                            <option value="">-- Pilih Tahunakademi --</option>
                            @foreach ($tahunakademi as $tha)
                                <option value="{{ $tha->id_tahunakademi }}"
                                    {{ old('tahunakademi', $nilai->id_tahunakademi ?? '') == $tha->id_tahunakademi ? 'selected' : '' }}>
                                    {{ $tha->tahun_akademi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control" required>
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}"
                                    {{ old('jurusan', $nilai->id_jurusan ?? '') == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Prodi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <option value="">-- Pilih Prodi --</option>
                        </select>
                    </div>

                    <div class="item-list mb-3">
                        <label>Komposisi Nilai Lain</label>
                        <input type="number" name="komposisi_nilai_lain" class="form-control" required
                            value="{{ old('komposisi_nilai_lain', $nilai->komposisi_nilai_lain ?? '') }}">
                    </div>

                    <div class="item-list mb-3">
                        <label>Komposisi Nilai UTS</label>
                        <input type="number" name="komposisi_nilai_uts" class="form-control" required
                            value="{{ old('komposisi_nilai_uts', $nilai->komposisi_nilai_uts ?? '') }}">
                    </div>

                    <div class="item-list mb-3">
                        <label>Komposisi Nilai UAS</label>
                        <input type="number" name="komposisi_nilai_uas" class="form-control" required
                            value="{{ old('komposisi_nilai_uas', $nilai->komposisi_nilai_uas ?? '') }}">
                    </div>

                    <input type="submit" value="Update Data" class="btn btn-primary">
                </div>
                <div class="card-footer">
                    <a href="/admin/nilai"><button type="button" class="btn btn-secondary">Kembali</button></a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#jurusan').on('change', function() {
            var jurusanID = $(this).val();
            if (jurusanID) {
                $.ajax({
                    url: '/getProdi/' + jurusanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#prodi').empty();
                        $('#prodi').append('<option value="">-- Pilih Prodi --</option>');
                        $.each(data, function(key, value) {
                            $('#prodi').append('<option value="' + value.id + '">' + value
                                .nama_prodi + '</option>');
                        });
                    }
                });
            } else {
                $('#prodi').empty();
                $('#prodi').append('<option value="">-- Pilih Prodi --</option>');
            }
        });
    </script>
@endsection
