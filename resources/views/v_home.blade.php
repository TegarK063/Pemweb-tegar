@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Home</h1>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Title : HOME</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <h4>Ini adalah halaman home</h4>
                <div>
                    <p>Nama PT : {{ $nama_pt }}</p>
                    <p>Alamat : {{ $alamat }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection