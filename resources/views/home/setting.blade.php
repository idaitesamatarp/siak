@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit data user</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit mr-1"></i>
                {{ucwords($user->name)}}
            </div>
            <form action="/setting/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama user" name="nama" value="{{ old('nama', ucwords($user->name)) }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email User</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email user" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password User</label>
                        <input type="password" class="form-control" id="pass" placeholder="Masukkan password user" name="pass" value="{{ old('pass', bcrypt($user->password)) }}" readonly>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync"></i>
                        Update
                    </button>
                    <a href="/dashboard" class="btn btn-dark">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection