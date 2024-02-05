@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah data pembelian toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-truck-loading mr-1"></i>
                Input Data Pembelian
            </div>
            <form action="/pembelian" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama barang" name="nama" value="{{ old('nama', "") }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pemasok">Nama Pemasok</label>
                        <select name="pemasok" id="pemasok" class="form-control">
                            <option value="">--Pilih Nama Pemasok--</option>
                            @foreach ($pemasok as $item)
                                <option value="{{$item->id}}">{{$item->nama_pemasok}}</option>
                            @endforeach
                        </select>
                        @error('pemasok')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Pembelian</label>
                        <input type="number" class="form-control" id="harga" placeholder="Masukkan harga pembelian" name="harga" value="{{ old('harga', "") }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Pembelian</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="Masukkan jumlah pembelian" name="jumlah" value="{{ old('jumlah', "") }}">
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total">Total Pembelian</label>
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total pembelian" value="0" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="Masukkan tanggal pembelian" name="tgl_beli" value="{{ old('tgl_beli', "") }}">
                        @error('tgl_beli')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga * jumlah);
            $("#total").val(total);
            console.log(total);
        });
    });
</script>
@endpush