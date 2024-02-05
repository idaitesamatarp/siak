<?php

namespace App\Http\Controllers;

use Auth;
use App\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah_pem = Pemasok::all();
        return view('pemasok.create', compact('tambah_pem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required|max:255',
            'telepon'=>'required|max:13',
        ]);

        $pemasok = new Pemasok;
        $pemasok->nama_pemasok = $request['nama'];
        $pemasok->alamat = $request['alamat'];
        $pemasok->no_telp = $request['telepon'];
        $pemasok->save();
        return redirect('/pemasok')->with('success', 'Data Pemasok Berhasil Ditambahkan !');
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
        $pemasok = Pemasok::where('id', $id)->first();
        return view('pemasok.edit', compact('pemasok'));
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
        $update = Pemasok::where('id', $id)->update([
            'nama_pemasok' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_telp' => $request['telepon']
        ]);
        return redirect('/pemasok')->with('success', 'Data Pemasok Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasok = Pemasok::where('id', $id)->delete();
        return redirect('/pemasok')->with('success', 'Data pemasok Berhasil Dihapus !');
    }
}
