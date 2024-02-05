@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah data barang toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-egg mr-1"></i>
                {{ucwords($barang->nama_barang)}}
            </div>
            <form action="/barang/{{$barang->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan nama barang" name="nama" value="{{ old('nama', ucwords($barang->nama_barang)) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="number" class="form-control" id="harga" placeholder="Masukkan harga barang" name="harga" value="{{ old('harga', $barang->harga) }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="number" class="form-control" id="stok" placeholder="Masukkan stok barang" name="stok" value="{{ old('stok', $barang->stok) }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync"></i>
                        Update
                    </button>
                    <a href="/barang" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection