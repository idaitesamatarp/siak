@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Laporan Keuangan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data laporan keuangan toko</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="/laporan/create" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-square"></i>
                    Buat Laporan
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
                                <th>Bulan</th>
                                <th>Pengeluaran</th>
                                <th>Pemasukan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporan as $item => $lap)
                            <tr>
                                {{setlocale(LC_ALL, 'id')}}
                                <td>{{$item+1}}</td>
                                <td>
                                    {{strftime("%B", strtotime($lap->created_at))}}
                                </td>
                                <td>Rp. {{$lap->tot_beli}}</td>
                                <td>Rp. {{$lap->tot_jual}}</td>
                                <td>Rp. {{$lap->total}}</td>
                                <td>{{ucwords($lap->keterangan)}}</td>
                                <form action="/laporan/{{$lap->id}}" method="POST" class="form-inline">
                                    <td>    
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
                                <td colspan="5" class="text-center">Tidak ada laporan keuangan</td>
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