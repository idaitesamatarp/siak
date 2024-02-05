@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Penjualan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data penjualan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="/penjualan/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Jual Barang
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($penjualan as $key => $pen)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ucwords($pen->barang->nama_barang)}}</td>
                                    <td>{{ucwords($pen->pelanggan->nama_pel)}}</td>
                                    <td>{{$pen->jumlah}}</td>
                                    <td>Rp. {{$pen->total}}</td>
                                    <form action="/penjualan/{{$pen->id}}" method="POST" class="form-inline">
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="/penjualan/{{$pen->id}}" role="button">
                                            <i class="fas fa-eye"></i>
                                            Lihat
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </td>
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">Tidak Ada Penjualan</td>
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