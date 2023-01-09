<?php

namespace App\Http\Controllers;

class KeuanganController extends Controller
{
    public function laporanKeuangan()
    {
        return view('pages.laporan.keuangan');
    }
    public function piutang()
    {
        return view('pages.laporan.keuangan');
    }
    public function cashflow()
    {
        return view('pages.laporan.keuangan');
    }
}
