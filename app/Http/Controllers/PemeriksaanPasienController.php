<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Stockin;

class PemeriksaanPasienController extends Controller
{
    //
    public function index()
    {
        $total_pasien_hari_ini = Kunjungan::where('tanggal', date('Y-m-d'))->count();
        $total_pasien_7_hari = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(7))->count();
        $total_pasien_1_bulan = Kunjungan::where('tanggal', '>=', Carbon::now()->subDays(30))->count();
        $total_pemasukan = Kunjungan::select(DB::raw("sum(tarif_obat + tarif_periksa) as pemasukan"))->where('status_bayar',1)->first();
        //$kunjungan = Kunjungan::with('poli','pasien','dokter','obat')->get();
        $kunjungan = DB::table('kunjungan as k')
            ->join('pasien as p','k.pasien_idpasien','=','p.idpasien')
            ->join('dokter as d','k.dokter_iddokter','=','d.iddokter')
            ->join('poli as po','k.poli_idpoli','=','po.idpoli')
            ->select('po.nama_lengkap as poli','d.nama_lengkap as dokter', 'p.nama_lengkap as pasien', 'k.*')
            ->get();

        return view('pages.pemeriksaan.index', compact('kunjungan', 'total_pasien_hari_ini', 'total_pasien_7_hari', 'total_pasien_1_bulan', 'total_pemasukan'));
    }
    public function edit($id)
    {
        $kunjungan = Kunjungan::find($id);
        $obat = Obat::all();
        return view('pages.pemeriksaan.edit', compact('kunjungan', 'obat', 'id'));
    }
    public function bayar(Request $request)
    {
        $kunjungan = Kunjungan::where('idkunjungan',$request->id)->first();


        return response()->json([
            'data' => view('pages.pemeriksaan.bayar',compact('kunjungan'))->render()
        ]);
    }
    public function bayarput(Request $request, $id)
    {
        try {
            $kunjungan = Kunjungan::find($id);
            $kunjungan->tarif_periksa = $request->get('nominal_pembayaran');
            $kunjungan->metode_pembayaran = $request->get('metode_pembayaran');
            if ($request->get('metode_pembayaran') == "Cash") {
                $kunjungan->status_bayar = 1;
                $kunjungan->status = "Selesai";
            }
            if ($request->get('metode_pembayaran') == "Kredit") {
                $kunjungan->status_bayar = 0;
                $kunjungan->status = "Belum Bayar";
            }
            if ($request->get('metode_pembayaran') == "Gratis") {
                $kunjungan->status_bayar = 1;
                $kunjungan->status = "Selesai";
            }
            $kunjungan->jam_selesai = date("h:i:sa");
            $kunjungan->save();
            return redirect('pemeriksaan/index')->with('pesan', 'Berhasil');
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
    public function pembatalanPasien(Request $request)
    {
        $kunjungan = Kunjungan::find($request->get('id'));
        $kunjungan->status_bayar = 3;
        $kunjungan->status = "Batal";
        $kunjungan->save();

        return redirect()->route('pemeriksaan.index')->with('success', 'Berhasil Melakukan Pembatalan');
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
                $stokin = DB::table('obat_has_stok_in')->where('obat_idobat', (int) $value['obat_idobat'])->get();
                $kebutuhan = (int) $value['jumlah'];
                // return $stokin;
                foreach ($stokin as $key => $value2) {
                    $stok = (int) $value2->jumlah;
                    if ($stok != 0 && ($stok >= $kebutuhan)) {
                        DB::table('obat_has_stok_in')->where('obat_idobat', (int) $value['obat_idobat'])->where('stok_in_idstok_in', $value2->stok_in_idstok_in)->update([
                            'jumlah' =>  $stok - $kebutuhan
                        ]);
                        $kebutuhan = $stok - $kebutuhan;
                        break;
                    } else if ($stok != 0 && ($stok < $kebutuhan)) {
                        DB::table('obat_has_stok_in')->where('obat_idobat', (int) $value['obat_idobat'])->where('stok_in_idstok_in', $value2->stok_in_idstok_in)->update([
                            'jumlah' =>  0
                        ]);
                        $kebutuhan = $kebutuhan - $stok;
                    } else { }
                }
            }
            DB::commit();
            return "berhasil";
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
