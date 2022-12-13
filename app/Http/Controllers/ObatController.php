<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    //
    public function index()
    {
        $obat = Obat::all();
        return view('pages.obat.index', compact('obat'));
    }
    public function create()
    {
        return view('pages.obat.add');
    }
    public function store(Request $request)
    {
        try {
            $obat = new Obat();
            $obat->nama = $request->get('nama');
            $obat->save();
            return redirect('obat/index')->with('pesan', 'Berhasil Tambah Data obat');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function edit($id)
    {
        $obat = Obat::where('idobat', $id)->first();
        return view('pages.obat.edit', compact('obat'));
    }
    public function update(Request $request, $id)
    {
        try {
            $obat = Obat::find($id);
            $obat->nama = $request->get('nama');
            $obat->save();
            return redirect('obat/index')->with('pesan', 'Berhasil Ubah Data obat');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        $obat = Obat::where('idobat', $id)->first();
        return view('pages.obat.show', compact('obat'));
    }
    public function delete($id)
    {
        try {
            Obat::where('idobat', $id)->delete();
            return redirect('obat/index')->with('pesan', 'Berhasil Hapus Data obat');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
