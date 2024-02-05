@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data pembelian toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open mr-1"></i>
                Pembelian {{ucwords($pembelian->barang)}}
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <input type="text" class="form-control" value="{{ucwords($pembelian->barang)}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pemasok">Nama Pemasok</label>
                        <input type="text" class="form-control" value="{{$pembelian->pemasok->nama_pemasok}}" readonly>

                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Pembelian</label>
                        <input type="text" class="form-control" value="{{$pembelian->harga}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Pembelian</label>
                        <input type="text" class="form-control" value="{{$pembelian->jumlah}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="total">Total Pembelian</label>
                        <input type="text" class="form-control" value="{{$pembelian->total}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pembelian</label>
                        <input type="date" class="form-control" value="{{$pembelian->tgl_beli}}" readonly>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="/pembelian" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection