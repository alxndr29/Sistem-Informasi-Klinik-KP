<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Kunjungan;

class PendaftaranPasienController extends Controller
{
    //
    public function index()
    {
        $pasien = Pasien::all();
        $poli = Poli::all();
        $dokter = Dokter::all();
        return view('pages.pendaftaran.index', compact('pasien', 'poli', 'dokter'));
    }
    public function store(Request $request){

        try{
            $kunjungan = new Kunjungan();
            $kunjungan->status = "Menunggu Pemeriksaan";
            $kunjungan->pasien_idpasien = $request->get('pasien');
            $kunjungan->dokter_iddokter = $request->get('dokter');
            $kunjungan->poli_idpoli = $request->get('poli');
            $kunjungan->diagnosa_awal = $request->get('diagnosa_awal');
            $kunjungan->jam_datang = date("h:i:sa");
            $kunjungan->tanggal = date("Y-m-d");
            $kunjungan->jam_selesai = null;
            $kunjungan->hasil_diagnosa = null;
            $kunjungan->save();
            return redirect('pendaftaran/index')->with('pesan', 'Berhasil Melakukan Pendaftaran Pasien');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function storePasienBaru($method, $parameters)
    {
        try{
            $kunjungan = new Kunjungan();
            $kunjungan->status = "Menunggu Pemeriksaan";
            $kunjungan->pasien_idpasien = $request->get('pasien');
            $kunjungan->dokter_iddokter = $request->get('dokter');
            $kunjungan->poli_idpoli = $request->get('poli');
            $kunjungan->diagnosa_awal = $request->get('diagnosa_awal');
            $kunjungan->jam_datang = date("h:i:sa");
            $kunjungan->tanggal = date("Y-m-d");
            $kunjungan->jam_selesai = null;
            $kunjungan->hasil_diagnosa = null;
            $kunjungan->save();
            return redirect('pendaftaran/index')->with('pesan', 'Berhasil Melakukan Pendaftaran Pasien');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
