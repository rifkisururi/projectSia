<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplayer = Supplier::All();
        return view('admin.suplayer.index', ['suplayer' => $suplayer]);
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
        $tambah_supplier = new \App\Supplier;
        $tambah_supplier->kd_supp = $request->addkdsupp;
        $tambah_supplier->nm_supp = $request->addnmsupp;
        $tambah_supplier->alamat = $request->addalamat;
        $tambah_supplier->telpon = $request->addtelepon;
        $tambah_supplier->save();
        return redirect('/suplayer');
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
        $supplier = Supplier::findOrFail($id);
        return view('admin.suplayer.edit', ['supplier' => $supplier]);
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
        $update_supp = Supplier::findOrFail($id);
        $update_supp->kd_supp = $request->addkdsupp;
        $update_supp->nm_supp = $request->addnmsupp;
        $update_supp->alamat = $request->addalamat;
        $update_supp->telpon = $request->addtelepon;
        $update_supp->save();

        return redirect('/suplayer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Supplier::findOrFail($id);
        $hapus->delete();
        return redirect('/suplayer');
    }
}
