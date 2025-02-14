<?php

namespace App\Http\Controllers;

use App\Models\KelengkapanRegistrasiHaji;
use Illuminate\Http\Request;

class KelengkapanRegistrasiHajiController extends Controller
{
    public function index()
    {
        $data = KelengkapanRegistrasiHaji::all();
        return view('pages.setting-haji.kelengkapan-registrasi.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-haji.kelengkapan-registrasi.create');
    }

    public function store(Request $request)
    {
        KelengkapanRegistrasiHaji::create($request->all());
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = KelengkapanRegistrasiHaji::findOrFail($id);
        return view('pages.setting-haji.kelengkapan-registrasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KelengkapanRegistrasiHaji::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = KelengkapanRegistrasiHaji::findOrFail($id);
        $data->delete();
        return redirect()->route('kelengkapan-registrasi.index')->with('success', 'data berhasil di hapus');
    }
}
