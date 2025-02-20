<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use App\Models\JadwalKeberangkatan;
use App\Models\JenisOpsi;
use App\Models\PaketUmroh;
use Illuminate\Http\Request;

class PaketUmrohController extends Controller
{
    public function index()
    {
        // $data = PaketUmroh::first();
        // $fasilitas = $data->fasilitas;
        $data = PaketUmroh::all();
        // return response($data);
        return view('pages.setting-umroh.paket-umroh.index', compact('data'));
    }

    public function create()
    {
        $opsis = JenisOpsi::where('nama', 'Tipe Kamar')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        $jadwal_keberangkatan = JadwalKeberangkatan::all();
        return view('pages.setting-umroh.paket-umroh.create', compact('opsis', 'jadwal_keberangkatan'));
    }

    public function store(Request $request)
    {
        PaketUmroh::create($request->all());
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $opsis = JenisOpsi::where('nama', 'Tipe Kamar')
            ->first()
            ->data_opsi()
            ->where('status', 'aktif')
            ->get();
        $data = PaketUmroh::findOrFail($id);
        $jadwal_keberangkatan = JadwalKeberangkatan::all();
        return view('pages.setting-umroh.paket-umroh.edit', compact('data', 'opsis', 'jadwal_keberangkatan'));
    }

    public function update(Request $request, $id)
    {
        $data = PaketUmroh::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = PaketUmroh::findOrFail($id);
        $data->delete();
        return redirect()->route('paket-umroh.index')->with('success', 'data berhasil di hapus');
    }
}
