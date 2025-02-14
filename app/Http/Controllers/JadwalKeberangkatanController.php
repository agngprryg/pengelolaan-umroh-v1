<?php

namespace App\Http\Controllers;

use App\Models\JadwalKeberangkatan;
use Illuminate\Http\Request;

class JadwalKeberangkatanController extends Controller
{
    public function index()
    {
        $data = JadwalKeberangkatan::all();
        return view('pages.setting-umroh.jadwal-keberangkatan.index', compact('data'));
    }

    public function create()
    {
        return view('pages.setting-umroh.jadwal-keberangkatan.create');
    }

    public function store(Request $request)
    {
        JadwalKeberangkatan::create($request->all());
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $data = JadwalKeberangkatan::findOrFail($id);
        return view('pages.setting-umroh.jadwal-keberangkatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JadwalKeberangkatan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $data = JadwalKeberangkatan::findOrFail($id);
        $data->delete();
        return redirect()->route('jadwal-keberangkatan.index')->with('success', 'data berhasil di hapus');
    }
}
