<?php

namespace App\Http\Controllers;

use App\Models\JadwalKeberangkatan;
use App\Models\PaketUmroh;
use Illuminate\Http\Request;

class JadwalKeberangkatanController extends Controller
{
    public function index()
    {
        $data = PaketUmroh::with('jadwal_keberangkatan')->get();
        // return response($data);
        return view('pages.setting-umroh.jadwal-keberangkatan.index', compact('data'));
    }

    public function create()
    {
        $paket = PaketUmroh::all();
        return view('pages.setting-umroh.jadwal-keberangkatan.create', compact('paket'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        JadwalKeberangkatan::create($request->all());
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = PaketUmroh::with('jadwal_keberangkatan')->findOrFail($id);
        return view('pages.setting-umroh.jadwal-keberangkatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PaketUmroh::with('jadwal_keberangkatan')->findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = PaketUmroh::with('jadwal_keberangkatan')->findOrFail($id);
        $data->delete();
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di hapus');
    }
}
