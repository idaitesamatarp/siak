@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit data pemasok toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit mr-1"></i>
                Data Pemasok {{ucwords($pemasok->nama_pemasok)}}
            </div>
            <form action="/pemasok/{{$pemasok->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pemasok">Nama Pemasok</label>
                        <input type="text" class="form-control" id="nama_pel" placeholder="Masukkan nama pemasok" name="nama" value="{{ old('nama', ucwords($pemasok->nama_pemasok)) }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pemasok</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan alamat pemasok" name="alamat">{{ old('alamat', ucwords($pemasok->alamat)) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No. Telepon Pemasok</label>
                        <input type="number" class="form-control" id="telepon" placeholder="Masukkan nomor telepon pemasok" name="telepon" value="{{ old('telepon', $pemasok->no_telp) }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync"></i>
                        Update
                    </button>
                    <a href="/pemasok" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection