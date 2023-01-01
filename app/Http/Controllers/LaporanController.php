<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function indexLaporanKeungan($tahun = null, $bulan = null)
    {
        if ($bulan != null && $tahun != null) {
            $kunjungan = Kunjungan::where('status', 'selesai')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->get();
            $totalPendapatan = Kunjungan::where('status', 'selesai')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->select(DB::raw('sum(tarif_obat + tarif_periksa) as totalpendapatan'))->first();
            $total = $totalPendapatan->totalpendapatan;

            return view('pages.laporan.detail', compact('kunjungan', 'total'));
        } else {
            $currentYear = date('Y');
            if ($tahun != null) {
                $currentYear = $tahun;
            }
            $januari = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 1)->count();
            $februari = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 2)->count();
            $maret = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 3)->count();
            $april = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 4)->count();
            $mei = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 5)->count();
            $juni = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 6)->count();
            $juli = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 7)->count();
            $agustus = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 8)->count();
            $september = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 9)->count();
            $oktober = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 10)->count();
            $november = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 11)->count();
            $desember = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 12)->count();
            return view('pages.laporan.index', compact('currentYear', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'));
        }
    }
    public function showDetailLaporanKeuangan()
    { }
}
