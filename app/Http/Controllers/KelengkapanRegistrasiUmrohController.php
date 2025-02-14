<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanRegistrasiUmroh;
use Illuminate\Http\Request;

class KelengkapanRegistrasiUmrohController extends Controller
{
    public function index()
    {
        $data = KelengkapanRegistrasiUmroh::all();
        return view('pages.setting-umroh.kelengkapan-registrasi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.kelengkapan-registrasi.create');
    }

    public function store(Request $request)
    {
        KelengkapanRegistrasiUmroh::create($request->all());
        return redirect()->route('kelengkapan-registrasi-umroh.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = KelengkapanRegistrasiUmroh::findOrFail($id);
        return view('pages.setting-umroh.kelengkapan-registrasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KelengkapanRegistrasiUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kelengkapan-registrasi-umroh.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = KelengkapanRegistrasiUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('kelengkapan-registrasi-umroh.index')->with('success', 'data berhasil di hapus');
    }
}
