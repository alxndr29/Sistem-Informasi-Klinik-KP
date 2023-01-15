<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\DB;

class PendaftaranPasienController extends Controller
{
    //
    public function index()
    {
        $pasien = Pasien::all();
        // return $pasien;
        $poli = DB::table('poli')->get();
        $dokter = Dokter::all();
        return view('pages.pendaftaran.index', compact('pasien', 'poli', 'dokter'));
    }
    public function store(Request $request){
        // return $request->all();

        $checkKunjungan = DB::table('kunjungan')
            ->where('pasien_idpasien', $request->get('pasien'))
        ->whereBetween('status', ['Menunggu Pembayaran', 'Menunggu Pemeriksaan'])
        ->get();
//            Kunjungan::
//        where('pasien_idpasien', $request->get('pasien'))->where('status','Menunggu Pemeriksaan')->orWhere('status', 'Menunggu Pembayaran')->get();

        if (count($checkKunjungan) > 0)
        {
            return redirect()->route('pemeriksaan.index')->with('fail', 'Pasien Masih Terdaftar Pada Antrian');
        }

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
            return redirect()->route('pemeriksaan.index')->with('success', 'Pasien Berhasil Terdaftar Pada Antrian');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function pendaftaranPasienBaru(Request $request)
    {

        $pasien = Pasien::updateOrCreate([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'no_telp' => $request->get('no_telp'),
        ]);

//        $pasien = new Pasien();
//        $pasien->nama_lengkap = $request->get('nama_lengkap');
//        $pasien->jenis_kelamin = $request->get('jenis_kelamin');
//        $pasien->umur = $request->get('umur');
//        $pasien->no_telp = $request->get('no_telp');
//        $pasien->save();
        $kunjungan = new Kunjungan();
        $kunjungan->status = "Menunggu Pemeriksaan";
        $kunjungan->pasien_idpasien = $pasien->idpasien;
        $kunjungan->dokter_iddokter = $request->get('dokter');
        $kunjungan->poli_idpoli = $request->get('poliklinik');
        $kunjungan->diagnosa_awal = $request->get('diagnosa_awal');
        $kunjungan->jam_datang = date("h:i:sa");
        $kunjungan->tanggal = date("Y-m-d");
        $kunjungan->jam_selesai = null;
        $kunjungan->hasil_diagnosa = null;
        $kunjungan->save();

        return redirect()->route('pemeriksaan.index')->with('success', 'Pasien Atas Nama' . $request->nama_lengkap .'Berhasil Terdaftar Pada Antrian');
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
            return redirect()->route('pemeriksaan.index')->with('success', 'Pasien Atas Nama' . $request->nama_lengkap .'Berhasil Terdaftar Pada Antrian');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
