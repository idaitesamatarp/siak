<?php

namespace App\Http\Controllers;

use Auth;
use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah_pel = Pelanggan::all();
        return view('pelanggan.create', compact('tambah_pel'));
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
            'alamat'=>'required|max:255',
            'telepon'=>'required|max:13',
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->nama_pel = $request['nama'];
        $pelanggan->email = $request['email'];
        $pelanggan->alamat = $request['alamat'];
        $pelanggan->telepon = $request['telepon'];
        $pelanggan->save();
        return redirect('/pelanggan')->with('success', 'Data Pelanggan Berhasil Ditambahkan !');
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
        $pelanggan = Pelanggan::where('id', $id)->first();
        return view('pelanggan.edit', compact('pelanggan'));
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
        $update = Pelanggan::where('id', $id)->update([
            'nama_pel' => $request['nama_pel'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon']
        ]);
        return redirect('/pelanggan')->with('success', 'Data Pelanggan Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->delete();
        return redirect('/pelanggan')->with('success', 'Data Pelanggan Berhasil Dihapus !');
    }
}
