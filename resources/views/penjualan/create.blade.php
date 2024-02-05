@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Penjualan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah data penjualan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-truck-loading mr-1"></i>
                Input Data Penjualan
            </div>
            <form action="/penjualan" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <select name="barang" id="barang" class="form-control">
                            <option value="">--pilih barang--</option>
                            @foreach ($barang as $item)
                                <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                            @endforeach
                        </select>
                        @error('barang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pelanggan">Nama pelanggan</label>
                        <select name="pelanggan" id="pelanggan" class="form-control">
                            <option value="">--pilih nama pelanggan--</option>
                            @foreach ($pelanggan as $item)
                                <option value="{{$item->id}}">{{$item->nama_pel}}</option>
                            @endforeach
                        </select>
                        @error('pelanggan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Penjualan</label>
                        <input type="number" class="form-control" id="harga" placeholder="Masukkan harga penjualan" name="harga" value="{{ old('harga', "") }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Penjualan</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="Masukkan jumlah penjualan" name="jumlah" value="{{ old('jumlah', "") }}" min="1">
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total">Total Penjualan</label>
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total penjualan" value="0" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="Masukkan tanggal penjualan" name="tgl_jual" value="{{ old('tgl_jual', "") }}">
                        @error('tgl_')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
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