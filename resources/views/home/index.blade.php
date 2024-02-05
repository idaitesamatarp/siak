@extends('template.master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">
                                    Pelanggan
                                </div>
                                <div class="h5 mb-0 font-weight-bold">
                                    {{$pelanggan}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x"></i>
                            </div> 
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/pelanggan">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">
                                    Total Barang
                                </div>
                                <div class="h5 mb-0 font-weight-bold">
                                    {{$barang}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-3x"></i>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/barang">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-uppercase mb-1">
                                    Laba Rugi
                                </div>
                                <div class="h5 mb-0 font-weight-bold" id="labarugi">
                                    Rp. {{$laporan->total}}
                                    <h5>{{$laporan->keterangan}}</h5>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-3x"></i>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/laporan">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Pembelian
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="display: none">
                                {{ $tot_beli = 0 }}
                            </div>
                            <table class="table table-striped table-bordered" id="dataTable1" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Barang</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelian as $key => $pem)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$pem->tgl_beli}}</td>
                                        <td>{{ucwords($pem->barang)}}</td>
                                        <td>Rp. {{$pem->tot}}</td>
                                        <div style="display: none">{{$tot_beli += $pem->tot}}</div>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total Pembelian</td>
                                        <td id="totbeli">Rp. {{$tot_beli}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Penjualan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="display: none">
                                {{ $tot_jual = 0 }}
                            </div>
                            <table class="table table-striped table-bordered" id="dataTable2" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Barang</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $key => $pen)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$pen->tgl_jual}}</td>
                                        <td>{{ucwords($pen->nama_barang)}}</td>
                                        <td>Rp. {{$pen->tot}}</td>
                                        <div style="display: none">{{$tot_jual += $pen->tot}}</div>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total Penjualan</td>
                                        <td id="totjual">Rp. {{$tot_jual}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection