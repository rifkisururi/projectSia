<?php

namespace App\Http\Controllers;

use App\DetailPesan;
use App\Pemesanan;
use Alert;
use DB;

use Illuminate\Http\Request;

class DetailPesanController extends Controller
{
    public function simpan(Request $request)
    {
        //Simpan ke table pemesanan
        $tambah_pemesanan = new \App\Pemesanan;
        $tambah_pemesanan->no_pesan = $request->no_pesan;
        $tambah_pemesanan->tgl_pesan = $request->tgl;
        $tambah_pemesanan->total = $request->total;
        $tambah_pemesanan->kd_supp = $request->supp;
        $tambah_pemesanan->save();
        //SIMPAN DATA KE TABEL DETAIL

        DB::select('call sp_migrasiTempDataPemesanan()');

        Alert::success('Pesan ', 'Data berhasil disimpan');
        return redirect('/transaksi');
    }
}
