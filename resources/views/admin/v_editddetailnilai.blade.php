@extends('layout.v_tamplate')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Detail Nilai</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="nav-content d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.detailnilai', ['id_nilai' => $nilai->id_nilai]) }}" class="btn btn-primary">Kembali</a>
                </div>

                <div class="form-edit-nilai">
                    <form action="{{ route('admin.updatedetailnilai', $detailnilai->id_detail_nilai) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="item-list mb-3">
                            <label>NIM</label>
                            <select name="nim" id="nim" class="form-control" required>
                                <option value="">-- Pilih NIM --</option>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ $m->nim }}"
                                        {{ old('nim', $detailnilai->nim) == $m->nim ? 'selected' : '' }}>
                                        {{ $m->nim }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nama Mahasiswa</label>
                            <input type="text" id="nama_display" class="form-control" value="{{ old('nama_mahasiswa', $detailnilai->nama_mahasiswa) }}" readonly>
                            <input type="hidden" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa', $detailnilai->nama_mahasiswa) }}">
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai Lain-lain</label>
                            <input type="number" name="lain_lain" class="form-control" value="{{ old('lain_lain', $detailnilai->lain_lain) }}" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai UTS</label>
                            <input type="number" name="uts" class="form-control" value="{{ old('uts', $detailnilai->uts) }}" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>Nilai UAS</label>
                            <input type="number" name="uas" class="form-control" value="{{ old('uas', $detailnilai->uas) }}" required>
                        </div>

                        {{-- <div class="item-list mb-3">
                            <label>Nilai Akhir</label>
                            <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir', $detailnilai->nilai_akhir) }}" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>GRADE</label>
                            <input type="text" name="grade" class="form-control" value="{{ old('grade', $detailnilai->grade) }}" required>
                        </div>

                        <div class="item-list mb-3">
                            <label>STATUS</label>
                            <input type="text" name="status" class="form-control" value="{{ old('status', $detailnilai->status) }}" required>
                        </div> --}}

                        <div class="item-list mb-3">
                            <label>KETERANGAN</label>
                            <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan', $detailnilai->keterangan) }}" required>
                        </div>

                        <input type="hidden" name="id_nilai" value="{{ $detailnilai->id_nilai }}">
                        {{-- <div class="item-list mb-3">
                            <label>ID Nilai</label>
                            <select name="id_nilai" class="form-control" required>
                                <option value="">-- Pilih ID Nilai --</option>
                                @foreach ($nilai as $n)
                                    <option value="{{ $n->id_nilai }}"
                                        {{ old('id_nilai', $detailnilai->id_nilai) == $n->id_nilai ? 'selected' : '' }}>
                                        {{ $n->id_nilai }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="text-center">
                            <input type="submit" value="Update" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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