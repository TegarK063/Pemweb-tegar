@extends('layout.v_tamplate')
@section('content')
    <div class="container">
        <h2>DATA BARANG</h2>
        <div class="search-container">
            <label for="search">Cari berdasarkan:</label>
            <select>
                <option>Kode Barang</option>
                <option>Nama Barang</option>
            </select>
            <input type="text" id="search" placeholder="Cari Data">
            <button>Cari</button>
        </div>
        <button>+ Tambah Data</button>
        <button>Print Data Barang</button>
        <button>Keluar Aplikasi</button>
        <table>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar Produk</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>BRG01</td>
                <td>Samsung M30s</td>
                <td>7</td>
                <td>Rp 2.520.000,00</td>
                <td>Rp 2.700.000,00</td>
                <td><img src="{{ asset('assets/img/784-xiaomi-redmi-note-6-pro-f.jpg') }}" width="50"></td>
                <td>
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                </td>
            </tr>
            <!-- Tambahkan baris lain sesuai kebutuhan -->
        </table>
    </div>
@endsection