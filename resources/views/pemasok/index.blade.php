@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data pemasok toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="/pemasok/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Tambah Pemasok
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
                                <th>Nama Pemasok</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Pemasok</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($pemasok as $key => $pem)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ucwords($pem->nama_pemasok)}}</td>
                                    <td>{{ucwords($pem->alamat)}}</td>
                                    <td>{{$pem->no_telp}}</td>
                                    <form action="/pemasok/{{$pem->id}}" method="POST" class="form-inline">
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="/pemasok/{{$pem->id}}/edit" role="button">
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
                                    <td colspan="5" style="text-align: center">Tidak Ada Pemasok</td>
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