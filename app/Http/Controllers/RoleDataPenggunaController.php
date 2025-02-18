<?php

namespace App\Http\Controllers;

use App\Models\RoleDataPengguna;
use Illuminate\Http\Request;

class RoleDataPenggunaController extends Controller
{
    public function index()
    {
        $data = RoleDataPengguna::all();
        return view('pages.data-role.index', compact('data'));
    }

    public function create()
    {
        return view('pages.data-role.create');
    }

    public function store(Request $request)
    {
        RoleDataPengguna::create($request->all());
        return redirect()->route('data-role.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = RoleDataPengguna::findOrFail($id);
        return view('pages.data-role.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RoleDataPengguna::findOrFail($id);
        $data->update($request->all());
    }

    public function destroy($id)
    {
        $data = RoleDataPengguna::findOrFail($id);
        $data->delete();
    }
}
