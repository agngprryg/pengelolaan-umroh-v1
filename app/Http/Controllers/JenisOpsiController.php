<?php

namespace App\Http\Controllers;

use App\Models\JenisOpsi;
use Illuminate\Http\Request;

class JenisOpsiController extends Controller
{

    public function index()
    {
        $jenis_opsi = JenisOpsi::all();
        return view('pages.pusat-data.data-opsi.jenis-opsi.index', compact('jenis_opsi'));
    }

    public function create()
    {
        return view('pages.pusat-data.data-opsi.jenis-opsi.create');
    }

    public function store(Request $request)
    {
        JenisOpsi::create($request->all());
        return redirect()->route('jenis-opsi.index')->with('success', 'data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $opsi = JenisOpsi::findOrFail($id);
        $opsi->delete();
        return redirect()->route('jenis-opsi.index')->with('success', 'data berhasil dihapus');
    }
}
