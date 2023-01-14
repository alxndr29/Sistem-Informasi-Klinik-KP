<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;

class PiutangController extends Controller
{
    //
    public function index()
    {
        $kunjungan = Kunjungan::where('status', 'Belum Bayar')->get();
        return view('pages.piutang.index', compact('kunjungan'));
    }
    public function edit($id)
    { 
        $kunjungan = Kunjungan::where('idkunjungan',$id)->first();
        return view('pages.piutang.detail',compact('kunjungan'));
    }
    public function update(Request $request, $id)
    { 
        try{
            $kunjungan = Kunjungan::where('idkunjungan', $id)->first();
            $kunjungan->status = "Selesai";
            $kunjungan->status_bayar = 1;
            $kunjungan->save();
            return redirect('laporan/keuangan/piutang')->with('pesan', 'Berhasil Melakukan Pembayaran');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
