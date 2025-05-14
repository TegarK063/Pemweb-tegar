@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <div class="card shadow mb-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>

            <!-- Form start -->
            <form action="/dosen/update/{{ $dosen->id_dosen }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-box">
                        <label for="">NIP</label>
                        <input type="text" name="nip" value="{{ $dosen->nip }}">
                    </div>
                    <div class="form-box">
                        <label for="">Nama Dosen</label>
                        <input type="text" name="nama_dosen" value="{{ $dosen->nama_dosen }}">
                    </div>
                    <div class="form-box">
                        <label for="">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" value="{{ $dosen->bidang_keahlian }}">
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
                    <div class="form-box">
                        <label>Foto Dosen</label>
                        <input type="file" name="foto_dosen">
                        @if ($dosen->foto_dosen)
                            <img src="{{ asset('assets/fotodosen/' . $dosen->foto_dosen) }}" width="100">
                        @endif
                    </div>
                    <input type="submit" value="Update Data" class="btn btn-primary">
                </div>
                <div class="card-footer">
                    <a href="/dosen"><button type="button" class="btn btn-primary">Kembali</button></a>
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
