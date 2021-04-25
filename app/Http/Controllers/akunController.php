<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use RealRashid\SweetAlert\Facades\Alert;

class akunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = Akun::All();
        return view('admin.akun.index', ['akun' => $akun]);
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
        $add_akun = new Akun;
        $add_akun->kd_akun = $request->kd_akun;
        $add_akun->nm_akun = $request->nm_akun;
        $add_akun->save();
        Alert::success('Pesan ', 'Data berhasil disimpan');
        return redirect('/akun');
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
    public function edit($kd_akun)
    {
        $akun = Akun::find($kd_akun);
        return view('admin.akun.edit', compact('akun'));
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
        $a = Akun::findOrFail($id);
        $a->nm_akun = $request->get('nm_akun');

        $a->save();
        Alert::success('Update', 'Data Berhasil di update');
        return redirect('/akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_akun)
    {
        $barang = Akun::findOrFail($kd_akun);
        $barang->delete();
        Alert::success('Pesan ', 'Data berhasil dihapus');
        return redirect('/akun');
    }
}
