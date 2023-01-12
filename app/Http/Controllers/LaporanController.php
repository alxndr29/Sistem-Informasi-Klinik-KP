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
            $januari = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 1)->where('status', 'selesai')->count();
            $februari = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 2)->where('status', 'selesai')->count();
            $maret = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 3)->where('status', 'selesai')->count();
            $april = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 4)->where('status', 'selesai')->count();
            $mei = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 5)->where('status', 'selesai')->count();
            $juni = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 6)->where('status', 'selesai')->count();
            $juli = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 7)->where('status', 'selesai')->count();
            $agustus = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 8)->where('status', 'selesai')->count();
            $september = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 9)->where('status', 'selesai')->count();
            $oktober = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 10)->where('status', 'selesai')->count();
            $november = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 11)->where('status', 'selesai')->count();
            $desember = Kunjungan::whereYear('created_at', $currentYear)->whereMonth('created_at', 12)->where('status', 'selesai')->count();
            return view('pages.laporan.index', compact('currentYear', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'));
        }
    }
    public function showDetailLaporanKeuangan()
    { }

    public function cashflow()
    {
        return view('pages.laporan.cashflow');
    }

    public function piutang()
    {
        return view('pages.laporan.cashflow');
    }
    public function keuangan()
    {
        // $kunjungan = Kunjungan::all();
        // return view('pages.laporan.keuangan', compact('kunjungan'));
        return redirect('laporan/index');
    }
}
