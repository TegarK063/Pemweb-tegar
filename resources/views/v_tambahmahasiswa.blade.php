@extends('layout.v_tamplate')
@section('content')
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="nav-content d-flex justify-content-end mb-3">
                    <a href="{{ url('/mahasiswa') }}" class="btn btn-primary">Kembali</a>
                </div>

                <div class="form-tambah-dosen">
                    <form action="{{ url('/mahasiswa/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="item-list mb-3">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <div class="item-list mb-3">
                            <label>Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control" required>
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ old('jurusan', $mahasiswa->id_jurusan ?? '') == $j->id ? 'selected' : '' }}>
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
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Tingkat</label>
                            <input type="text" name="tingkat" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Semester</label>
                            <input type="text" name="semester" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>

                        <div class="item-list mb-4">
                            <label>Foto Mahasiswa</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_m" class="custom-file-input" id="inputfilee" required>
                                    <label class="custom-file-label" for="inputfilee">Choose File</label>
                                </div>
                            </div>
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
