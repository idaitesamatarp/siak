@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data pembelian toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="/pembelian/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Beli Barang
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
                                <th>Pemasok</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Pemasok</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($pembelian as $key => $pem)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ucwords($pem->barang)}}</td>
                                    <td>{{ucwords($pem->pemasok->nama_pemasok)}}</td>
                                    <td>{{$pem->jumlah}}</td>
                                    <td>{{$pem->satuan}}</td>
                                    <td>Rp. {{$pem->total}}</td>
                                    <form action="/pembelian/{{$pem->id}}" method="POST" class="form-inline">
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="/pembelian/{{$pem->id}}" role="button">
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
                                    <td colspan="8" style="text-align: center">Tidak Ada Pembelian</td>
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