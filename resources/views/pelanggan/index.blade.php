@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Pelanggan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data pelanggan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="/pelanggan/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Tambah Pelanggan
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelanggan as $key => $pel)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ucwords($pel->nama_pel)}}</td>
                                    <td>{{$pel->email}}</td>
                                    <td>{{ucwords($pel->alamat)}}</td>
                                    <td>{{$pel->telepon}}</td>
                                    <form action="/pelanggan/{{$pel->id}}" method="POST" class="form-inline">
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="/pelanggan/{{$pel->id}}/edit" role="button">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>    
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="far fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">Tidak Ada Pelanggan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>
@endpush