<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Obat;
class PemeriksaanPasienController extends Controller
{
    //
    public function index()
    {
        $kunjungan = Kunjungan::all();
       
        return view('pages.pemeriksaan.index', compact('kunjungan'));
    }
    public function edit($id){
        $kunjungan = Kunjungan::find($id);
        $obat = Obat::all();
        return view('pages.pemeriksaan.edit',compact('kunjungan','obat'));
    }
}
