<?php

namespace App\Http\Controllers;

use Auth;
use App\Pembelian;
use App\Pemasok;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasok = Pemasok::all();
        return view('pembelian.create', compact('pemasok'));
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
            'nama' => 'required|max:30',
            'harga' => 'required|max:10',
            'jumlah' => 'required|max:5',
            'total' => 'required',
            'tgl_beli' => 'date'
        ]);

        $pembelian = new Pembelian;
        $pembelian->barang = $request['nama'];
        $pembelian->id_pemasok = $request['pemasok'];
        $pembelian->harga = $request['harga'];
        $pembelian->jumlah = $request['jumlah'];
        $pembelian->total = $request['total'];
        $pembelian->tgl_beli = $request['tgl_beli'];
        $pembelian->save();
        return redirect('/pembelian')->with('success', 'Pembelian Berhasil Dilakukan !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembelian = Pembelian::find($id);
        return view('pembelian.show', compact('pembelian'));
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
        $pembelian = Pembelian::where('id', $id)->delete();
        return redirect('/pembelian')->with('success', "Daftar Pembelian Telah Dihapus !");
    }
}
