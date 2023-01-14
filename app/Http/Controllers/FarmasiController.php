<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kunjungan;
use App\Models\Stockin;
use Illuminate\Support\Facades\DB;

class FarmasiController extends Controller
{
    public function stokBarang($bulan = null)
    {
        $a = null;
        $obat = null;
        if ($bulan != null) {
            // $obat = Obat::with(['kunjungan' => function ($query) use ($bulan) {
            //     $query->whereMonth('tanggal', '=', $bulan);
            // }])
            // ->with(['stokin' => function ($query) use ($bulan) {
            //     $query->whereMonth('tanggal', '=', $bulan);
            // }])->get();
            // return $obat;
            $a = DB::table('obat')
                ->join('obat_has_stok_in', 'obat.idobat', '=', 'obat_has_stok_in.obat_idobat')
                ->join('stok_in', 'stok_in.idstok_in', '=', 'obat_has_stok_in.stok_in_idstok_in')
                ->join('resep_stock_out', 'obat.idobat', '=', 'resep_stock_out.obat_idobat')
                ->join('kunjungan', 'kunjungan.idkunjungan', '=', 'resep_stock_out.kunjungan_idkunjungan')
                ->whereMonth('kunjungan.tanggal', $bulan)
                ->whereMonth('stok_in.tanggal', $bulan)
                ->groupBy('obat.idobat')
                ->select('obat.*', 'resep_stock_out.jumlah as rso_jumlah', 'resep_stock_out.harga as rso_harga', 'obat_has_stok_in.jumlah as ohs_jumlah', 'obat_has_stok_in.harga as ohs_harga')
                ->get();
            //   return $a;
        } else {
            $obat = Obat::all();
        }
        return view('pages.farmasi.stok-barang', compact('obat','a','bulan'));
    }
    public function obatMasuk($awal = null, $akhir = null)
    {
        $obats = Obat::all();
        if ($awal == null && $akhir == null) {
            $stokin = Stockin::all();
        } else {
            $stokin = Stockin::where('tanggal', '', $awal)->where('tanggal', '', $akhir)->get();
        }
        return view('pages.farmasi.stok-masuk', compact('stokin', 'obats'));
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
