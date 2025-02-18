<?php

namespace App\Http\Controllers;

use App\Models\BiayaRegistrasiHaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaRegistrasiHajiController extends Controller
{
    public function index()
    {
        $biaya_registrasi = BiayaRegistrasiHaji::all();
        return view('pages.setting-haji.biaya-registrasi.index', compact('biaya_registrasi'));
    }

    public function create()
    {
        return view('pages.setting-haji.biaya-registrasi.create');
    }

    public function store(Request $request)
    {
        BiayaRegistrasiHaji::create($request->all());
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = BiayaRegistrasiHaji::findOrFail($id);
        return view('pages.setting-haji.biaya-registrasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = BiayaRegistrasiHaji::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = BiayaRegistrasiHaji::findOrFail($id);
        $data->delete();
        return redirect()->route('biaya-registrasi.index')->with('success', 'data berhasil dihapus');
    }
}
