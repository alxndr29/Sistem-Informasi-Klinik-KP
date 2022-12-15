<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class PemeriksaanPasienController extends Controller
{
    //
    public function index()
    {
        $kunjungan = Kunjungan::all();

        return view('pages.pemeriksaan.index', compact('kunjungan'));
    }
    public function edit($id)
    {
        $kunjungan = Kunjungan::find($id);
        $obat = Obat::all();
        return view('pages.pemeriksaan.edit', compact('kunjungan', 'obat', 'id'));
    }
    public function editAdmin($id){
        $kunjungan = Kunjungan::find($id);
        return $kunjungan->resep_stock_out()->get();
    }
    public function storeDokter(Request $request)
    {
        DB::beginTransaction();
        try {
            $kunjungan = Kunjungan::find($request->get('id'));
            $kunjungan->tarif_obat = $request->get('biaya-obat');
            foreach ($request->get('daftar_produk') as $key => $value) {
                $kunjungan->resep_stock_out()->attach((int)$value['obat_idobat'], ['jumlah' => $value['jumlah'], 'harga' => $value['harga'], 'keterangan' => $value['dosis']]);
            }
            DB::commit();
            return "berhasil";
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
