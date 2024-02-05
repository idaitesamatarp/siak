@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data barang yang tersedia di toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                {{-- <a href="/barang/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Tambah Barang
                </a> --}}
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
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang as $key => $bar)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ucwords($bar->nama_barang)}}</td>
                                    <td>Rp. {{$bar->harga}}</td>
                                    <td>{{$bar->stok}} pcs</td>
                                    <form action="/barang/{{$bar->id}}" method="POST" class="form-inline">
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="/barang/{{$bar->id}}/edit" role="button">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" disabled>
                                            <i class="far fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center">Tidak Ada Barang (Kosong)</td>
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