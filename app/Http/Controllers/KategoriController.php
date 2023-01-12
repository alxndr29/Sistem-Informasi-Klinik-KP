<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = DB::table('kategori')->get();
        return view('pages.kategori.index',compact('categories'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        DB::table('kategori')->insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('kategori.index')->with(['success' => 'menambahkan data baru']);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $productCategory =  DB::table('kategori')->where('id',$id)->first();
        return view('pages.kategori.edit', compact('productCategory'));
    }

    public function update(Request $request, $id)
    {
        DB::table('kategori')->where('id',$id)->update([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('kategori.index')->with(['success' => 'merubah data menjadi ' . $request->input('name')]);
    }

    public function destroy($id)
    {
        DB::table('kategori')->where('id',$id)->delete();
        return redirect()->route('kategori.index')->with(['success' => 'menghapus data']);
    }
}
