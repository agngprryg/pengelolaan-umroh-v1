<?php

namespace App\Http\Controllers;

use App\Models\DataPerlengkapanUmroh;
use App\Models\KelengkapanUmroh;
use Illuminate\Http\Request;

class KelengkapanUmrohController extends Controller
{
    public function index()
    {
        $data = KelengkapanUmroh::with('perlengkapan_umroh')->get();
        // return response($data);
        return view('pages.setting-umroh.kelengkapan-umroh.index', compact('data'));
    }

    public function create()
    {
        $barang = DataPerlengkapanUmroh::all();
        return view('pages.setting-umroh.kelengkapan-umroh.create', compact('barang'));
    }

    public function store(Request $request)
    {
        KelengkapanUmroh::create($request->all());
        return redirect()->route('kelengkapan-umroh.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = KelengkapanUmroh::findOrFail($id);
        return view('pages.setting-umroh.kelengkapan-umroh.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KelengkapanUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kelengkapan-umroh.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = KelengkapanUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('kelengkapan-umroh.index')->with('success', 'data berhasil di hapus');
    }
}
