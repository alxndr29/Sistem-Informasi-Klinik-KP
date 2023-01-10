<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TindakanController extends Controller
{
    public function index()
    {

        return view('pages.tindakan.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        return redirect()->route('daftar-produk.index')->with(['success' => 'menambahkan data baru']);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
