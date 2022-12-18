<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PemeriksaanPasienController extends Controller
{
    //
    public function index()
    {
        $total_pasien_hari_ini = Kunjungan::where('tanggal', date('Y-m-d'))->count();
        $total_pasien_7_hari = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(7))->count();
        $total_pasien_1_bulan = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(30))->count();
        $total_pemasukan = Kunjungan::select(DB::raw("sum(tarif_obat + tarif_periksa) as pemasukan"))->first();
        $kunjungan = Kunjungan::all();

        return view('pages.pemeriksaan.index', compact('kunjungan', 'total_pasien_hari_ini', 'total_pasien_7_hari', 'total_pasien_1_bulan', 'total_pemasukan'));
    }
    public function edit($id)
    {
        $kunjungan = Kunjungan::find($id);
        $obat = Obat::all();
        return view('pages.pemeriksaan.edit', compact('kunjungan', 'obat', 'id'));
    }
    public function bayar($id)
    {
        $kunjungan = Kunjungan::find($id)->first();
        return view('pages.pemeriksaan.bayar', compact('kunjungan', 'id'));
    }
    public function bayarput(Request $request, $id)
    {
        try {
            $kunjungan = Kunjungan::find($id);
            $kunjungan->tarif_periksa = $request->get('nominal_pembayaran');
            $kunjungan->metode_pembayaran = $request->get('metode_pembayaran');
            $kunjungan->jam_selesai = date("h:i:sa");
            $kunjungan->status = "Selesai";
            $kunjungan->save();
            return redirect('pemeriksaan/index')->with('pesan', 'Berhasil Melakukan Pembayaran');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function editAdmin($id)
    {
        $kunjungan = Kunjungan::find($id);
        foreach ($kunjungan->obat as $value) {
            return $value->pivot->harga;
        }
    }
    public function storeDokter(Request $request)
    {
        DB::beginTransaction();
        try {
            $kunjungan = Kunjungan::find($request->get('id'));
            $kunjungan->tarif_obat = $request->get('biaya-obat');
            $kunjungan->hasil_diagnosa = $request->get('hasil_diagnosa');
            $kunjungan->status = "Menunggu Pembayaran";
            $kunjungan->save();
            foreach ($request->get('daftar_produk') as $key => $value) {
                $kunjungan->obat()->attach((int) $value['obat_idobat'], ['jumlah' => $value['jumlah'], 'harga' => $value['harga'], 'keterangan' => $value['dosis']]);
            }
            DB::commit();
            return "berhasil";
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
