<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
class LaporanController extends Controller
{
    //
    public function indexLaporanKeungan($bulan = null, $tahun = null)
    {
        if($bulan != null && $tahun != null){
            $kunjungan = Kunjungan::whereYear('created_at',$tahun)->whereMonth('created_at',$bulan)->get();
            return view('pages.laporan.index', compact('kunjungan'));
        }else{
            
        }
    
    }
    public function showDetailLaporanKeuangan()
    { }
}
