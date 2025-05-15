@extends('layout.v_tamplate')
@section('content')
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="nav-content d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.nilai') }}" class="btn btn-primary">Kembali</a>
                </div>

                <div class="form-tambah-dosen">
                    <form action="{{ route ('admin.storenilai') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                            <label>komposisi_nilai_lain</label>
                            <input type="number" name="komposisi_nilai_lain" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Komposisi_nilai_uts</label>
                            <input type="number" name="komposisi_nilai_uts" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Komposisi_nilai_uas</label>
                            <input type="number" name="komposisi_nilai_uas" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
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
