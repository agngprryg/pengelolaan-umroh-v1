<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\RoleDataPengguna;
use Illuminate\Http\Request;

class DataPenggunaController extends Controller
{
    public function index()
    {

        $data_penggunas = DataPengguna::with('role_data_pengguna')->get();
        // return response()->json($data_penggunas);
        return view('pages.pusat-data.data-pengguna.index', compact('data_penggunas'));
    }

    public function create()
    {
        $roles = RoleDataPengguna::all();
        return view('pages.pusat-data.data-pengguna.create', compact('roles'));
    }

    public function store(Request $request)
    {
        DataPengguna::create($request->all());
        return redirect()->route('data-pengguna.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data_pengguna = DataPengguna::findOrFail($id);
        $roles = RoleDataPengguna::all();
        return view('pages.pusat-data.data-pengguna.edit', compact('data_pengguna', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data_pengguna = DataPengguna::findOrFail($id);

        $data_pengguna->update($request->all());
        return redirect()->route('data-pengguna.index')->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data_pengguna = DataPengguna::findOrFail($id);
        $data_pengguna->delete();
        return redirect()->route('data-pengguna.index')->with('success', 'data berhasil di hapus');
    }
}
