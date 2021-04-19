<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = \App\Barang::All();
        return view('admin.barang.barang', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.barang.input');
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
        $tambah_barang = new \App\Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->harga = $request->addharga;
        $tambah_barang->stok = $request->addstok;
        $tambah_barang->save();
        Alert::success('Pesan ', 'Data berhasil disimpan');
        return redirect('/barang');
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
        $barang = Barang::find($id);
        return view('admin.barang.edit', compact('barang'));
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
        $update_barang = Barang::findOrFail($id);
        //$update_barang->kd_brg = $request->get('addkdbrg');
        $update_barang->nm_brg = $request->get('addnmbrg');
        $update_barang->harga = $request->get('addharga');
        $update_barang->stok = $request->get('addstok');
        $update_barang->save();
        Alert::success('Update', 'Data Berhasil di update');
        return redirect('/barang');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_brg)
    {
        //
        $barang = \App\Barang::findOrFail($kd_brg);
        $barang->delete();
        Alert::success('Pesan ', 'Data berhasil dihapus');
        return redirect()->route('barang.index');
    }
}
