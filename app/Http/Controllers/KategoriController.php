<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $categories = DB::table('kategori')->get();
        $categories = Kategori::all();
        // return $categories;
        return view('pages.kategori.index', compact('categories'));
    }

    public function create()
    { }

    public function store(Request $request)
    {
        try {
            $kategori = new Kategori();
            $kategori->name = $request->get('name');
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();
            return redirect()->back()->with('pesan', 'Berhasil Tambah Kategori');;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    { }

    public function edit($id)
    { }

    public function update(Request $request, $id)
    {
        try {
            $kategori = Kategori::find($id);
            $kategori->name = $request->get('name');
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();
            return redirect()->back()->with('pesan', 'Berhasil Ubah Kategori');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $kategori = Kategori::find($id);
            $kategori->delete();
            return redirect()->back()->with('pesan', 'Berhasil Hapus Kategori');;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
