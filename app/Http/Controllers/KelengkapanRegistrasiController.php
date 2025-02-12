<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanRegistrasi;
use Illuminate\Http\Request;

class KelengkapanRegistrasiController extends Controller
{
    public function index()
    {
        $data = KelengkapanRegistrasi::all();
        return view('pages.setting-haji.kelengkapan-registrasi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-haji.kelengkapan-registrasi.create');
    }

    public function store(Request $request)
    {
        KelengkapanRegistrasi::create($request->all());
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = KelengkapanRegistrasi::findOrFail($id);
        return view('pages.setting-haji.kelengkapan-registrasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KelengkapanRegistrasi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = KelengkapanRegistrasi::findOrFail($id);
        $data->delete();
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di hapus');
    }
}
