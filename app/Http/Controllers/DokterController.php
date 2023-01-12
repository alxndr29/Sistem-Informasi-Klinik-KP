<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    //
    public function index()
    {
        $dokter = Dokter::all();
        return view('pages.dokter.index', compact('dokter'));
    }
    public function create()
    {
        return view('pages.dokter.add');
    }
    public function store(Request $request)
    {
        try {
            $dokter = new Dokter();
            $dokter->nama_lengkap = $request->get('nama_lengkap');
            $dokter->tempat_lahir = $request->get('tempat_lahir');
            $dokter->tanggal_lahir = $request->get('tanggal_lahir');
            $dokter->alamat = $request->get('alamat');
            $dokter->jenis_kelamin = $request->get('jenis_kelamin');
            $dokter->save();

            $user = new User();
            $user->name = $request->get('nama_lengkap');
            $user->email = $request->get('email');
            if($request->get('password') != null){
                $user->password = Hash::make($request->get('password'));
            }

            $user->role = 'Dokter';
            $user->save();


            return redirect()->route('daftar-dokter.index')->with('success', 'Berhasil Tambah Data Dokter');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function edit($id)
    {
        $dokter = Dokter::where('iddokter', $id)->first();
        return view('pages.dokter.edit', compact('dokter'));
    }
    public function update(Request $request, $id)
    {
        try {
            $dokter = Dokter::find($id);
            $dokter->nama_lengkap = $request->get('nama_lengkap');
            $dokter->tempat_lahir = $request->get('tempat_lahir');
            $dokter->tanggal_lahir = $request->get('tanggal_lahir');
            $dokter->alamat = $request->get('alamat');
            $dokter->jenis_kelamin = $request->get('jenis_kelamin');
            $dokter->save();

            User::where('name', $request->nama_lengkap)->update([
                'name' => $request->nama_lengkap
            ]);

            return redirect()->route('daftar-dokter.index')->with('success', 'Berhasil Ubah Data Dokter');

        } catch (\Exception $e) {

        }
    }
    public function show($id)
    {
        $dokter = Dokter::where('iddokter', $id)->first();
        return view('pages.dokter.show', compact('dokter'));
    }
    public function delete($id)
    {
        try {
            Dokter::where('iddokter', $id)->delete();
            return redirect('dokter/index')->with('success', 'Berhasil Hapus Data Dokter');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        User::where('name', $dokter->first()->name);
        $dokter->delete();
        return redirect()->route('daftar-dokter.index')->with('success', 'Berhasil Hapus Data Dokter');
    }
}
