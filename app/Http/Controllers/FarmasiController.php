<?php

namespace App\Http\Controllers;

use App\Models\Obat;

class FarmasiController extends Controller
{
    public function stokBarang()
    {

        return view('pages.farmasi.stok-barang');
    }
    public function obatMasuk()
    {
        $obats = Obat::all();
        return view('pages.farmasi.stok-masuk',compact('obats'));
    }
    public function obatKeluar()
    {
        return view('pages.farmasi.stok-keluar');
    }
}
