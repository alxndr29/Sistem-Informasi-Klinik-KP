<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //    public function __construct()
    //    {
    //        $this->middleware('auth');
    //    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_pasien_hari_ini = Kunjungan::where('tanggal', date('Y-m-d'))->count();
        $total_pasien_7_hari = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(7))->count();
        $total_pasien_1_bulan = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(30))->count();
        $total_pemasukan = Kunjungan::select(DB::raw("sum(tarif_obat + tarif_periksa) as pemasukan"))->where('status_bayar',1)->where('tanggal', date('Y-m-d'))->first();
        $kunjungan =  Kunjungan::where('tanggal', date('Y-m-d'))->get();
        $obat = Obat::count();
       
        return view('dashboard.index', compact('obat','kunjungan', 'total_pasien_hari_ini', 'total_pasien_1_bulan', 'total_pemasukan'));
    }
    public function dashboardView()
    {
        $kunjungan = Kunjungan::all();
        return view('dashboard.index', compact('kunjungan'));
    }
}
