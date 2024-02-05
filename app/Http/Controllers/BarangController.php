<?php

namespace App\Http\Controllers;

use Auth;
use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah_bar = Barang::all();
        return view('barang.create', compact('tambah_bar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama'=>'required',
            'harga'=>'required|max:10',
            'stok'=>'required|max:10',
        ]);

        $barang = new Barang;
        $barang->nama_barang = $request['nama'];
        $barang->harga = $request['harga'];
        $barang->stok = $request['stok'];
        $barang->save();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Ditambahkan !');
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
        $barang = Barang::where('id', $id)->first();
        return view('barang.edit', compact('barang'));
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
        $update = Barang::where('id', $id)->update([
            'harga' => $request['harga'],
            'stok' => $request['stok'],
        ]);
        return redirect('/barang')->with('success', 'Data Berhasil Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->delete();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Dihapus !');
    }
}
