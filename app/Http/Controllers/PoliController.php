<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    //
    //
    public function index()
    {
        // $poli = DB::table('poli')->get();
        $poli = Poli::all();
        return view('pages.poli.index', compact('poli'));
    }
    public function create()
    {
        return view('pages.poli.add');
    }
    public function store(Request $request)
    {
        try {
            $poli = new poli();
            $poli->nama_lengkap = $request->get('nama_lengkap');
            $poli->save();
            return redirect('manajemen-klinik/poli')->with('pesan', 'Berhasil Tambah Data poli');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function edit($id)
    {
        $poli = Poli::where('idpoli', $id)->first();
        return view('pages.poli.edit', compact('poli'));
    }
    public function update(Request $request, $id)
    {
        try {
            $poli = Poli::find($id);
            $poli->nama_lengkap = $request->get('nama_lengkap');
            $poli->save();
            return redirect('manajemen-klinik/poli')->with('pesan', 'Berhasil Ubah Data poli');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    { }
    public function destroy($id)
    {
        try {
            Poli::where('idpoli', $id)->delete();
            return redirect('manajemen-klinik/poli')->with('pesan', 'Berhasil Hapus Data poli');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
