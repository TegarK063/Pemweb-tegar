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
                            <label>Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" required>
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
@endsection
