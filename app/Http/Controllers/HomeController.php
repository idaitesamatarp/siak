<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Pelanggan;
use App\Barang;
use App\Pemasok;
use App\Pembelian;
use App\Penjualan;
use App\Laporan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::count();
        $barang = DB::table('barangs')->count();
        $penjualan = DB::table('penjualans')
                    ->join('barangs', 'penjualans.id_barang', '=', 'barangs.id')
                    ->join('pelanggans', 'penjualans.id_pelanggan', '=', 'pelanggans.id')
                    ->select('penjualans.tgl_jual', 'barangs.nama_barang', DB::raw('SUM(penjualans.total) as tot'))
                    ->groupBy('penjualans.tgl_jual', 'barangs.nama_barang')
                    ->get();
        // print_r($penjualan);
        $pembelian = DB::table('pembelians')
                    ->select('tgl_beli','barang',DB::raw('SUM(total) as tot'))
                    ->groupBy('tgl_beli', 'barang')
                    ->get();
        $laporan = DB::table('laporan')
                    ->orderBy('id', 'desc')
                    ->limit(1)
                    ->first();
        // print_r($laporan);
        return view('home.index', compact('pelanggan','barang', 'penjualan', 'pembelian', 'laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
