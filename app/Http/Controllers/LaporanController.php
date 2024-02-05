<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Penjualan;
use App\Pembelian;
use App\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::all();
        $penjualan = DB::table('penjualans')
                    ->sum('total');
        // print_r($penjualan);
        $pembelian = DB::table('pembelians')
                    ->sum('total');
        return view('laporan.index', compact('laporan','penjualan','pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laporan = Laporan::all();
        $penjualan = DB::table('penjualans')
                    ->sum('total');
        // print_r($penjualan);
        $pembelian = DB::table('pembelians')
                    ->sum('total');
        return view('laporan.create', compact('laporan','penjualan','pembelian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laporan = new Laporan;
        $laporan->tot_beli = $request['modal'];
        $laporan->tot_jual = $request['hasil'];
        $laporan->total = $request['labarugi'];
        $laporan->keterangan = $request['ket'];
        $laporan->save();
        return redirect('/laporan')->with('success', 'Laporan Berhasil Dibuat !');
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
        $laporan = Laporan::where('id', $id)->delete();
        return redirect('/laporan')->with('success', "Laporan Telah Dihapus !");
    }
}
