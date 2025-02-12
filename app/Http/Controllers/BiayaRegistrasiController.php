<?php

namespace App\Http\Controllers;

use App\Models\BiayaRegistrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaRegistrasiController extends Controller
{
    public function index()
    {
        $biaya_registrasi = BiayaRegistrasi::all();
        return view('pages.setting-haji.biaya-registrasi.index', compact('biaya_registrasi'));
    }

    public function create()
    {
        return view('pages.setting-haji.biaya-registrasi.create');
    }

    public function store(Request $request)
    {
        BiayaRegistrasi::create($request->all());
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = BiayaRegistrasi::findOrFail($id);
        return view('pages.setting-haji.biaya-registrasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = BiayaRegistrasi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = BiayaRegistrasi::findOrFail($id);
        $data->delete();
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil dihapus');
    }
}
