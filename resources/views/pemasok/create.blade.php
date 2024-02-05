@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah data pemasok toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-people-carry mr-1"></i>
                Input Data Pemasok
            </div>
            <form action="/pemasok" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Pemasok</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama pemasok" name="nama" value="{{ old('nama', "") }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pemasok</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan alamat pemasok" name="alamat">{{ old('alamat', "") }}</textarea>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">No. Telepon Pemasok</label>
                        <input type="number" class="form-control" id="telepon" placeholder="Masukkan nomor telepon pemasok" name="telepon" value="{{ old('telepon', "") }}">
                        @error('telepon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
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