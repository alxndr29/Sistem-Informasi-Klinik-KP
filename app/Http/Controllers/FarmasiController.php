<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kunjungan;
use App\Models\Stockin;
class FarmasiController extends Controller
{
    public function stokBarang($bulan = null)
    {
        if($bulan != null){
            // $obat = Obat::whereMonth('created_at',$bulan);
        }else{
            $obat = Obat::all();
        }
        return view('pages.farmasi.stok-barang', compact('obat'));
    }
    public function obatMasuk($awal = null, $akhir = null)
    {
        $obats = Obat::all();
        if ($awal == null && $akhir == null) {
            $stokin = Stockin::all();
        } else {
            $stokin = Stockin::where('tanggal', '', $awal)->where('tanggal', '', $akhir)->get();
        }
        return view('pages.farmasi.stok-masuk', compact('stokin','obats'));
    }
    public function obatKeluar($awal = null, $akhir = null)
    {
        if ($awal == null && $akhir == null) {
            $kunjungan = Kunjungan::all();
        } else {
            $kunjungan = Kunjungan::where('tanggal', '', $awal)->where('tanggal', '', $akhir)->get();
        }
        return view('pages.farmasi.stok-keluar', compact('kunjungan'));
    }
}
