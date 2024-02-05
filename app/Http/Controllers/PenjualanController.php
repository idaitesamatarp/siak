<?php

namespace App\Http\Controllers;

use Auth;
use App\Penjualan;
use App\Barang;
use App\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $pelanggan = Pelanggan::all();
        return view('penjualan.create', compact('barang','pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request)->all();
        $request->validate([
            'barang' => 'required',
            'pelanggan' => 'required|max:30',
            'jumlah' => 'required|max:5',
            'harga' => 'required',
            'total' => 'required',
            'tgl_jual' => 'date'
        ]);
        $penjualan = new Penjualan;
        $penjualan->id_barang = $request['barang'];
        $penjualan->id_pelanggan = $request['pelanggan'];
        $penjualan->jumlah = $request['jumlah'];
        $penjualan->total = $request['total'];
        $penjualan->tgl_jual = $request['tgl_jual'];
        $penjualan->save();
        return redirect('/penjualan')->with('success', 'Penjualan Berhasil Dilakukan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan = Penjualan::find($id);
        return view('penjualan.show', compact('penjualan'));
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
        $penjualan = Penjualan::where('id', $id)->delete();
        return redirect('/penjualan')->with('success', "Daftar Penjualan Telah Dihapus !");
    }
}
