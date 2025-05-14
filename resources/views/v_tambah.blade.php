@extends('layout.v_tamplate')
@section('content')
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <div class="nav-content d-flex justify-content-end mb-3">
                    <a href="{{ url('/dosen') }}" class="btn btn-primary">Kembali</a>
                </div>
                
                <div class="form-tambah-dosen">
                    <form action="{{ url('/dosen/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="item-list mb-3">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Bidang Keahlian</label>
                            <input type="text" name="bidang_keahlian" class="form-control" required>
                        </div>

                        {{-- <div class="item-list mb-3">
                            <label>Mata Kuliah</label>
                            <select name="mata_kuliah" class="form-control" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($mata_kuliah as $mk)
                                    <option value="{{ $mk->id_matakuliah }}"
                                        {{ old('mata_kuliah', $dosen->id_matakuliah ?? '') == $mk->id_matakuliah ? 'selected' : '' }}>
                                        {{ $mk->nama_matakuliah }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="item-list mb-3">
                            <label>Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control" required>
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ old('jurusan', $dosen->id_jurusan ?? '') == $j->id ? 'selected' : '' }}>
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

                        <div class="item-list mb-4">
                            <label>Foto Dosen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_dosen" class="custom-file-input" id="inputfilee" required>
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
