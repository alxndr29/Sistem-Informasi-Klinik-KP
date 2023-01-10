<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    //
    public function index()
    {
        $pasien = Pasien::all();
        return view('pages.pasien.index', compact('pasien'));
    }
    public function create()
    {
        return view('pages.pasien.add');
    }
    public function store(Request $request)
    {
        try {
            $pasien = new Pasien();
            $pasien->tanggal = date('Y-m-d');
            $pasien->nik = $request->get('nik');
            $pasien->no_bpjs = $request->get('no_bpjs');
            $pasien->nama_lengkap = $request->get('nama_lengkap');
            $pasien->tanggal_lahir = $request->get('tanggal_lahir');
            $pasien->tempat_lahir = $request->get('tempat_lahir');
            $pasien->jenis_kelamin = $request->get('jenis_kelamin');
            $pasien->alamat = $request->get('alamat');
            $pasien->agama = $request->get('agama');
            $pasien->pekerjaan = $request->get('pekerjaan');
            $pasien->save();
            return redirect()->back()->with('pesan', 'Berhasil Tambah Data Pasien');
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('pesan', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $pasien = Pasien::where('idpasien', $id)->first();
        return view('pages.pasien.edit', compact('pasien'));
    }
    public function update(Request $request, $id)
    {
        try {
            $pasien = Pasien::find($id);
            $pasien->tanggal = date('Y-m-d');
            $pasien->nik = $request->get('nik');
            $pasien->no_bpjs = $request->get('no_bpjs');
            $pasien->nama_lengkap = $request->get('nama_lengkap');
            $pasien->tanggal_lahir = $request->get('tanggal_lahir');
            $pasien->tempat_lahir = $request->get('tempat_lahir');
            $pasien->jenis_kelamin = $request->get('jenis_kelamin');
            $pasien->alamat = $request->get('alamat');
            $pasien->agama = $request->get('agama');
            $pasien->pekerjaan = $request->get('pekerjaan');
            $pasien->save();
            return redirect()->back()->with('pesan', 'Berhasil Ubah Data Pasien');
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('pesan', $e->getMessage());
        }
    }
    public function show($id)
    {
        $pasien = Pasien::where('idpasien', $id)->first();
        return view('pages.pasien.show', compact('pasien'));
    }
    public function delete($id)
    {
        try {
            Pasien::where('idpasien', $id)->delete();
            return redirect('pasien/daftar-pasien')->with('pesan', 'Berhasil Hapus Data Pasien');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
