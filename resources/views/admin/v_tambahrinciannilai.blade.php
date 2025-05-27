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
                    <form action="{{ route('admin.storedetail') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="item-list mb-3">
                            <label>NIM</label>
                            <select name="nim" id="nim" class="form-control" required>
                                <option value="">-- Pilih NIM --</option>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ $m->nim }}"
                                        {{ old('detailnilai', $detailnilai->nim ?? '') == $m->nim ? 'selected' : '' }}>
                                        {{ $m->nim }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nama Mahasiswa</label>
                            <input type="text" id="nama_display" class="form-control" readonly>
                            <input type="hidden" name="nama_mahasiswa" id="nama_mahasiswa">
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai Lain-lain</label>
                            <input type="number" name="lain_lain" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai UTS</label>
                            <input type="number" name="uts" class="form-control" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai UAS</label>
                            <input type="number" name="uas" class="form-control" required>
                        </div>

                        {{-- <div class="item-list mb-3">
                            <label>Nilai Akhir</label>
                            <input type="number" name="nilai_akhir" class="form-control">
                        </div>

                        <div class="item-list mb-3">
                            <label>GRADE</label>
                            <input type="text" name="grade" class="form-control">
                        </div>

                        <div class="item-list mb-3">
                            <label>STATUS</label>
                            <input type="text" name="status" class="form-control">
                        </div> --}}

                        <div class="item-list mb-3">
                            <label>KETERANGAN</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>

                        <div class="item-list mb-3">
                            <label>ID Nilai</label>
                            <select name="id_nilai" class="form-control" required>
                                <option value="">-- Pilih ID Nilai --</option>
                                @foreach ($nilai as $n)
                                    <option value="{{ $n->id_nilai }}"
                                        {{ old('detailnilai', $detailnilai->id_nilai ?? '') == $n->id_nilai ? 'selected' : '' }}>
                                        {{ $n->id_nilai }}
                                    </option>
                                @endforeach
                            </select>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#nim').change(function() {
            var nim = $(this).val();

            if (nim) {
                $.ajax({
                    url: '{{ route('get.nama.mahasiswa', ':nim') }}'.replace(':nim', nim),
                    type: 'GET',
                    success: function(data) {
                        $('#nama_display').val(data.nama || '');
                        $('#nama_mahasiswa').val(data.nama || '');
                    },
                    error: function() {
                        alert("Gagal mengambil data mahasiswa.");
                    }
                });
            } else {
                $('#nama_display').val('');
                $('#nama_mahasiswa').val('');
            }
        });

        $(document).ready(function() {
            $('#nim').trigger('change');
        });
    </script>
@endsection
