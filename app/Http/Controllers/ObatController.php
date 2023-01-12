<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Stockin;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
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
        $kategori = Kategori::all();
        return view('pages.obat.add', compact('kategori'));
    }
    public function store(Request $request)
    {
        try {
            $obat = new Obat();
            $obat->nama = $request->get('nama');
            $obat->kategori = $request->get('kategori');
            $obat->satuan = $request->get('satuan');
            $obat->harga = $request->get('harga');
            $obat->save();
            return redirect('obat/index')->with('pesan', 'Berhasil Tambah Data obat');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function edit($id)
    {
        $obat = Obat::where('idobat', $id)->first();
        $kategori = Kategori::all();
        return view('pages.obat.edit', compact('obat','kategori'));
    }
    public function update(Request $request, $id)
    {
        try {
            $obat = Obat::find($id);
            $obat->nama = $request->get('nama');
            $obat->kategori = $request->get('kategori');
            $obat->satuan = $request->get('satuan');
            $obat->harga = $request->get('harga');
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
    public function get_obat()
    {
        return Obat::all();
    }
    public function tambahstok()
    {
        $obat = Obat::all();
        return view('pages.obat.tambahstok', compact('obat'));
    }
    public function tambahstokpost(Request $request)
    {
        DB::beginTransaction();
        try {
            $stockin = new Stockin();
            $stockin->tanggal = date('Y-m-d');
            $stockin->save();
            foreach ($request->get('daftar_harga') as $key => $value) {
                if ($request->get('daftar_harga')[$key] != 0 || $request->get('daftar_jumlah')[$key] != 0) {
                    $stockin->obat()->attach((int) $key, ['jumlah' => $request->get('daftar_jumlah')[$key], 'harga' => $request->get('daftar_harga')[$key]]);
                }
            }
            DB::commit();
            return redirect('farmasi/obat-masuk')->with('pesan', 'Berhasil Tambah Stok Obat');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function obatmasuk($awal = null, $akhir = null)
    {
        if ($awal == null && $akhir == null) {
            $stokin = Stockin::all();
          
        } else {
            $stokin = Stockin::where('tanggal', '', $awal)->where('tanggal', '', $akhir)->get();
        }

        return view('pages.stok.stokmasuk', compact('stokin'));
    }
    public function obatkeluar($awal = null, $akhir = null){
        if ($awal == null && $akhir == null) {
            $kunjungan = Kunjungan::all();
        } else {
            $kunjungan = Kunjungan::where('tanggal', '', $awal)->where('tanggal', '', $akhir)->get();
        }
        return view('pages.stok.stokkeluar', compact('kunjungan'));
    }
}
