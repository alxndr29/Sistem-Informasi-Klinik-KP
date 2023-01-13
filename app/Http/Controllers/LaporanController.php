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
            $kunjungan = Kunjungan::where('status', 'selesai')->where('status_bayar', 1)->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->get();
            $totalPendapatan = Kunjungan::where('status', 'selesai')->where('status_bayar', 1)->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->select(DB::raw('sum(tarif_obat + tarif_periksa) as totalpendapatan'))->first();
            $total = $totalPendapatan->totalpendapatan;
            return view('pages.laporan.detail', compact('kunjungan', 'total'));
        } else {
            $currentYear = date('Y');
            if ($tahun != null) {
                $currentYear = $tahun;
            }
            $januari = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 1)->where('status', 'selesai')->count();
            $februari = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 2)->where('status', 'selesai')->count();
            $maret = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 3)->where('status', 'selesai')->count();
            $april = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 4)->where('status', 'selesai')->count();
            $mei = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 5)->where('status', 'selesai')->count();
            $juni = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 6)->where('status', 'selesai')->count();
            $juli = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 7)->where('status', 'selesai')->count();
            $agustus = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 8)->where('status', 'selesai')->count();
            $september = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 9)->where('status', 'selesai')->count();
            $oktober = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 10)->where('status', 'selesai')->count();
            $november = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 11)->where('status', 'selesai')->count();
            $desember = Kunjungan::whereYear('created_at', $currentYear)->where('status_bayar', 1)->whereMonth('created_at', 12)->where('status', 'selesai')->count();
            return view('pages.laporan.index', compact('currentYear', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'));
        }
    }
    public function showDetailLaporanKeuangan()
    { }

    public function cashflow()
    {
        $currentYear = date('Y');
        $januari_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 1)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $januari_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 1)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $februari_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 2)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $februari_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 2)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $maret_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 3)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $maret_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 3)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $april_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 4)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $april_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 4)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $mei_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 5)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $mei_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 5)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $juni_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 6)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $juni_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 6)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $juli_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 7)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $juli_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 7)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $agustus_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 8)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $agustus_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 8)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $september_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 9)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $september_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 9)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $oktober_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 10)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $oktober_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 10)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $november_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 11)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $november_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 11)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        $desember_pemasukan = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 1)
            ->whereMonth('created_at', 12)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));
        $desember_piutang = Kunjungan::whereYear('created_at', $currentYear)
            ->where('status_bayar', 0)
            ->whereMonth('created_at', 12)
            ->sum(DB::raw('tarif_obat + tarif_periksa'));

        return view('pages.laporan.cashflow', compact(
            'currentYear',
            
            'januari_pemasukan',
            'januari_piutang',

            'februari_pemasukan',
            'februari_piutang',

            'maret_pemasukan',
            'maret_piutang',

            'april_pemasukan',
            'april_piutang',

            'mei_pemasukan',
            'mei_piutang',

            'juni_pemasukan',
            'juni_piutang',

            'juli_pemasukan',
            'juli_piutang',

            'agustus_pemasukan',
            'agustus_piutang',

            'september_pemasukan',
            'september_piutang',

            'oktober_pemasukan',
            'oktober_piutang',

            'november_pemasukan',
            'november_piutang',

            'desember_pemasukan',
            'desember_piutang',
        ));
    }

    public function piutang()
    {
        // return view('pages.laporan.cashflow');
        return redirect('piutang/index');
    }
    public function keuangan()
    {
        // $kunjungan = Kunjungan::all();
        // return view('pages.laporan.keuangan', compact('kunjungan'));
        return redirect('laporan/index');
    }
}
