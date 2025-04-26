@extends('layout.v_tamplate')
@section('content')
    <h1>Halaman Dosen</h1>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Title : HOME</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <h4>Ini adalah halaman home</h4>
                <div>
                    {{-- {{ dd($dosen) }} --}}
                    @foreach ($dosen as $data)
                    @if ($data['NIP'])
                    <p>NIP : {{ $data['NIP'] }}</p>
                    <p>Nama : {{ $data['Nama_Dosen'] }}</p>
                    <p>Nama : {{ $data['Mata_Kuliah'] }}</p>                     
                    @endif
                    @endforeach
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
@endsection
