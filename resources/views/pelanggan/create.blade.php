@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Pelanggan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah data pelanggan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-plus mr-1"></i>
                Input Data Pelanggan
            </div>
            <form action="/pelanggan" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pel">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pel" placeholder="Masukkan nama pelanggan" name="nama" value="{{ old('nama', "") }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email Pelanggan</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email pelanggan" name="email" value="{{ old('email', "") }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pelanggan</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan alamat pelanggan" name="alamat">{{ old('alamat', "") }}</textarea>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">No. Telpon Pelanggan</label>
                        <input type="number" class="form-control" id="telepon" placeholder="Masukkan nomor telepon pelanggan" name="telepon" value="{{ old('telepon', "") }}">
                        @error('telepon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                    <a href="/pelanggan" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection