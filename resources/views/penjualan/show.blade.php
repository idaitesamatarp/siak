@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Penjualan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data penjualan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open mr-1"></i>
                Penjualan {{ucwords($penjualan->barang->nama_barang)}}
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <input type="text" class="form-control" value="{{ucwords($penjualan->barang->nama_barang)}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" value="{{$penjualan->pelanggan->nama_pel}}" readonly>

                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Penjualan</label>
                        <input type="text" class="form-control" value="{{$penjualan->barang->harga}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Penjualan</label>
                        <input type="text" class="form-control" value="{{$penjualan->jumlah}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="total">Total Penjualan</label>
                        <input type="text" class="form-control" value="{{$penjualan->total}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Penjualan</label>
                        <input type="date" class="form-control" value="{{$penjualan->tgl_jual}}" readonly>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="/penjualan" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection