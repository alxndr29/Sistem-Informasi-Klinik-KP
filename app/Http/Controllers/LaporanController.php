<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function indexLaporanKeungan($bulan = null, $tahun = null)
    {
        if ($bulan != null && $tahun != null) {
            $kunjungan = Kunjungan::where('status', 'selesai')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->get();
            $totalPendapatan = Kunjungan::where('status', 'selesai')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->select(DB::raw('sum(tarif_obat + tarif_periksa) as totalpendapatan'))->first();
            $total = $totalPendapatan->totalpendapatan;
            // return $total;
            return view('pages.laporan.index', compact('kunjungan', 'total'));
        } else {
            $kunjungan = Kunjungan::all()->where('status', 'selesai');
            return view('pages.laporan.index', compact('kunjungan', 'totalPendapatan'));
        }
    }
    public function showDetailLaporanKeuangan()
    { }
}
