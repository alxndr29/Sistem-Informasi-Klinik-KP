<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('pages.user.index', compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }
    public function create()
    {
        return view('pages.user.add');
    }
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->get('nama');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->role = $request->get('role');
            $user->save();
            return redirect('user/index')->with('pesan', 'Berhasil Menambah user baru');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function update(Request $request, $id)
    {

        try {
            $user = User::find($id);
            $user->name = $request->get('nama');
            $user->email = $request->get('email');
            if($request->get('password') != null){
                $user->password = Hash::make($request->get('password'));
            }
            $user->role = $request->get('role');
            $user->save();
            return redirect('user/index')->with('pesan', 'Berhasil ubah data user');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
